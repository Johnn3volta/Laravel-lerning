<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = \App\Models\Role::create([
          'name'       => 'Author',
          'slug'       => 'author',
          'permissions' => [
            'create-post' => true
          ]
        ]);

        $editor = \App\Models\Role::create([
          'name'       => 'Editor',
          'slug'       => 'editor',
          'permissions' => [
            'sedit-post' => true,
            'publish'    => true
          ]
        ]);
    }
}
