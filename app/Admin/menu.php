<?php
Admin::menu()->label('Пользователи')->icon('fa-users')->items(function ()
{
    Admin::menu(App\Permit::class)->label('Права')->icon('fa-key');
    Admin::menu(App\Role::class)->label('Роли')->icon('fa-graduation-cap');
    Admin::menu(App\User::class)->label('Юзеры')->icon('fa-user');
});
Admin::menu(App\Post::class)->label('Новости')->icon('fa-graduation-cap');
Admin::menu(App\FileEntry::class)->label('Вложения')->icon('fa-graduation-cap');
Admin::menu(App\Schedule::class)->label('Расписание')->icon('fa-graduation-cap');
Admin::menu(App\gallery::class)->label('Категории')->icon('fa-graduation-cap');
Admin::menu(App\Category::class)->label('Галерея')->icon('fa-cubes');
Admin::menu(App\Style::class)->label('Стили')->icon('fa-cubes');