<?php

namespace Database\Seeders;

use App\Models\post;
use App\Models\User;
use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name'=>'tegar Dito Priandika',
        //     'email'=>'tegardito02@gmail.com',
        //     'password'=>bcrypt('123')
        // ]);
        // User::create([
        //     'name'=>'aisyatul huriyah',
        //     'email'=>'aisyatul@gmail.com',
        //     'password'=>bcrypt('123')
        // ]);

        // post::create([
        //     'title'=> 'judul pertama',
        //     'category_id'=>1,
        //     'user_id'=> 1,
        //     'slug'=>'judul-pertama',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste facilis neque dolore, corrupti id, quaerat accusamus assumenda aut ',
        //     'body'=>'<p> nulla dolorum obcaecati porro nisi explicabo impedit quasi reiciendis in aperiam unde quisquam odit necessitatibus debitis? Sit ad debitis consequatur assumenda a iure veniam. Assumenda in pariatur corporis sapiente iste nihil recusandae provident odio quaerat enim eveniet explicabo, vero itaque esse repellat, accusamus dolorum! Repellendus omnis saepe pariatur officiis voluptas illo eos officia quasi veniam amet,</p>'
        // ]);
        // post::create([
        //     'title'=> 'judul ke dua',
        //     'category_id'=>1,
        //     'user_id'=> 2,
        //     'slug'=>'judul ke-dua',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste facilis neque dolore, corrupti id, quaerat accusamus assumenda aut ',
        //     'body'=>'<p> nulla dolorum obcaecati porro nisi explicabo impedit quasi reiciendis in aperiam unde quisquam odit necessitatibus debitis? Sit ad debitis consequatur assumenda a iure veniam. Assumenda in pariatur corporis sapiente iste nihil recusandae provident odio quaerat enim eveniet explicabo, vero itaque esse repellat, accusamus dolorum! Repellendus omnis saepe pariatur officiis voluptas illo eos officia quasi veniam amet,</p>'
        // ]);
        // post::create([
        //     'title'=> 'judul ke tiga',
        //     'category_id'=>2,
        //     'user_id'=> 1,
        //     'slug'=>'judul-ke-tiga',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste facilis neque dolore, corrupti id, quaerat accusamus assumenda aut ',
        //     'body'=>'<p> nulla dolorum obcaecati porro nisi explicabo impedit quasi reiciendis in aperiam unde quisquam odit necessitatibus debitis? Sit ad debitis consequatur assumenda a iure veniam. Assumenda in pariatur corporis sapiente iste nihil recusandae provident odio quaerat enim eveniet explicabo, vero itaque esse repellat, accusamus dolorum! Repellendus omnis saepe pariatur officiis voluptas illo eos officia quasi veniam amet,</p>'
        // ]);
        // post::create([
        //     'title'=> 'judul ke empat',
        //     'category_id'=>2,
        //     'user_id'=> 2,
        //     'slug'=>'judul-ke-empat',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste facilis neque dolore, corrupti id, quaerat accusamus assumenda aut ',
        //     'body'=>'<p> nulla dolorum obcaecati porro nisi explicabo impedit quasi reiciendis in aperiam unde quisquam odit necessitatibus debitis? Sit ad debitis consequatur assumenda a iure veniam. Assumenda in pariatur corporis sapiente iste nihil recusandae provident odio quaerat enim eveniet explicabo, vero itaque esse repellat, accusamus dolorum! Repellendus omnis saepe pariatur officiis voluptas illo eos officia quasi veniam amet,</p>'
        // ]);
        // post::create([
        //     'title'=> 'judul ke lima',
        //     'category_id'=>3,
        //     'user_id'=> 2,
        //     'slug'=>'judul-ke-lima',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste facilis neque dolore, corrupti id, quaerat accusamus assumenda aut ',
        //     'body'=>'<p> nulla dolorum obcaecati porro nisi explicabo impedit quasi reiciendis in aperiam unde quisquam odit necessitatibus debitis? Sit ad debitis consequatur assumenda a iure veniam. Assumenda in pariatur corporis sapiente iste nihil recusandae provident odio quaerat enim eveniet explicabo, vero itaque esse repellat, accusamus dolorum! Repellendus omnis saepe pariatur officiis voluptas illo eos officia quasi veniam amet,</p>'
        // ]);
        // post::create([
        //     'title'=> 'judul ke enam',
        //     'category_id'=>3,
        //     'user_id'=> 1,
        //     'slug'=>'judul-ke-enam',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste facilis neque dolore, corrupti id, quaerat accusamus assumenda aut ',
        //     'body'=>'<p> nulla dolorum obcaecati porro nisi explicabo impedit quasi reiciendis in aperiam unde quisquam odit necessitatibus debitis? Sit ad debitis consequatur assumenda a iure veniam. Assumenda in pariatur corporis sapiente iste nihil recusandae provident odio quaerat enim eveniet explicabo, vero itaque esse repellat, accusamus dolorum! Repellendus omnis saepe pariatur officiis voluptas illo eos officia quasi veniam amet,</p>'
        // ]);
 
        category::create([
        'name'=>'web design',
        'slug'=>'web-design'
        ]);
        category::create([
        'name'=>'program',
        'slug'=>'program'
        ]);
        category::create([
        'name'=>'personal',
        'slug'=>'personal'
        ]);
        category::create([
        'name'=>'UI',
        'slug'=>'UI'
        ]);

        User::factory(10)->create();

        post::factory(40)->create();

        
    }
}
