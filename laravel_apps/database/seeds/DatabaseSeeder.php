<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ProductTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('tags')->truncate();
        DB::table('item_tag')->truncate();
        DB::table('categories')->truncate();
        DB::table('items')->truncate();
        DB::table('products')->truncate();

        $this->call([RolesTableSeeder::class, UsersTableSeeder::class]);
        $this->call([TagsTableSeeder::class, CategoriesTableSeeder::class, ItemsTableSeeder::class]);
        $this->call([ProductTableSeeder::class]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
