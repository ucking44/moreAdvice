<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('username', 'User')->first();
        $role_author = Role::where('username', 'Author')->first();
        $role_admin = Role::where('username', 'Admin')->first();

        $user = new User();
        $user->first_name = "Paul";
        $user->last_name = "Kingsley";
        $user->username = "paulking44";
        $user->email = "paul@gmail.com";
        $user->password = bcrypt("12345678");
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->first_name = "Uchechukwu";
        $admin->last_name = "Ogbuleke";
        $admin->username = "Admin";
        $admin->email = "ucking4niga@yahoo.com";
        $admin->password = bcrypt("12345678");
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->first_name = "Kingsley";
        $author->last_name = "Ogbuleke";
        $author->username = "Author";
        $author->email = "ucking44@gmail.com";
        $author->password = bcrypt("12345678");
        $author->save();
        $author->roles()->attach($role_author);

    }
}
