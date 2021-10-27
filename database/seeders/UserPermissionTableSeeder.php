<?php

use Illuminate\Database\Seeder;

class UserPermissionTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // создать связи между пользователями и правами
        foreach(App\Models\User::all() as $user) {
            foreach(App\Models\Permission::all() as $perm) {
                if (rand(1, 20) == 10) {
                    // $user->permissions()->attach($perm->id);
                }
            }
        }
    }
}
