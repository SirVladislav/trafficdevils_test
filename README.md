# Traffic Devils - PHP Test Task

## Запуск приложения

 - Из папки docker развернуть контейнеры
   docker-compose up --build -d

 - Запустить миграции + заполнение бд тестовыми данными
   docker-compose exec app php artisan migrate:refresh --seed

 - Перейти на 
   http://localhost:8000/

## Тестовые аккаунты
Аккаунт баера:
   buyer
   password

Аккаунт тим лида:
   lead
   password

Аккаунт админа:
   admin
   password
