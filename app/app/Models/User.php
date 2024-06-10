<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'role_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function buyers()
    {
        return $this->belongsToMany(User::class, 'lead_buyer', 'lead_id', 'buyer_id');
    }

    public function getUserRole(int $userId)
    {
        $role = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('users.id', $userId)
            ->select('roles.name as role_name')
            ->first();

        return $role ? $role->role_name : null;
    }

}
