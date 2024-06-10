<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showMainPage()
    {
        $userId = Auth::user()->id;

        switch (User::getUserRole($userId)) {
            case 'admin':
                return $this->loadAdminPage();
                break;

            case 'team_lead':
                return $this->loadLeadPage();
                break;

            case 'buyer':
                return $this->loadBuyerPage();
                break;

            default:
                return view('main');
        }
    }

    public function loadBuyerPage()
    {
        $user = Auth::user();
        $orders = $user->orders;

        return view('buyer_page', ['orders' => $orders]);
    }

    public function loadLeadPage()
    {
        $user = Auth::user();
        $buyers = $user->buyers()->with('orders')->get();

        return view('lead_page', ['buyers' => $buyers]);
    }

    public function loadAdminPage()
    {
        $leads = User::where('role_id', 2)->get();

        $leadData = $leads->map(function ($lead) {
            $buyers = $lead->buyers;

            $totalOrdersCount = $buyers->reduce(function ($carry, $buyer) {
                return $carry + $buyer->orders->count();
            }, 0);

            return [
                'lead' => $lead,
                'total_orders_count' => $totalOrdersCount,
            ];
        });

        return view('admin_page', ['leadData' => $leadData]);
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function addOrder(Request $request)
    {
        $request->validate([
            'orderInfo' => 'required|string|max:255',
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->orderInfo = $request->orderInfo;
        $order->save();

        return redirect()->back()->with('success', 'Order added successfully.');
    }

    public function editOrder(Request $request, $id)
    {
        $request->validate([
            'orderInfo' => 'required|string|max:255',
        ]);

        $order = Order::findOrFail($id);
        $order->orderInfo = $request->orderInfo;
        $order->save();

        return redirect()->back()->with('success', 'Order updated successfully.');
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'password' => 'required|string|min:7',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('main');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
