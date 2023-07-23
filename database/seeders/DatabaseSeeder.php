<?php

namespace Database\Seeders;

use App\Models\Tasks\TaskType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Van Darkholme';
        $admin->email = 'admin@dungeon.cum';
        $admin->email_verified_at = now();
        $admin->password = \Hash::make('oral_cumshot');
        $admin->save();

        $type = new TaskType();
        $type->type = 'flag';
        $type->save();

        $type = new TaskType();
        $type->type = 'form';
        $type->save();
    }
}
