<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            RadioProgramTableSeeder::class,
            ArticleCategoryTableSeeder::class,
            ArticleTableSeeder::class,
            NewsCategoryTableSeeder::class,
            NewsTableSeeder::class,
            FanMessagesTableSeeder::class

        ]);



    }

}
