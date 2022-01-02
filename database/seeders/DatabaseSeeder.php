<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'id' => 1,
            'content' => 'Content of first blog entry',
            'title' => 'Fist blog title',
            'category' => 'General',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
