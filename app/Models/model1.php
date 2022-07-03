<?php

namespace App\Models;

class model1 {
    private static $blog_post =[
            [
            "title" => "judul post pertama",
            "slug"=> "judul-post-pertama",
            "author" => "aisyatul huriyah ",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit, iusto, quis aliquam deserunt accusantium vitae consectetur illo reiciendis iste aliquid minus perferendis corrupti ducimus suscipit magni natus non et soluta!",
            ],
            [
                "title" => "judul post kedua",
                "slug"=> "judul-post-kedua",
                "author" => "tegar dito priandika",
                "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic vitae culpa praesentium earum perspiciatis nostrum velit dolor vel sed autem harum assumenda atque a eligendi eveniet, eaque sit quos veniam inventore perferendis, eos dignissimos. Culpa enim corporis accusamus aut! Odit magni obcaecati dicta ipsam nobis nesciunt ab amet? Error dolorum rerum magni nostrum amet aperiam, accusamus nobis placeat nihil, veniam laborum quod. Laboriosam doloribus unde atque deserunt consequuntur, sapiente maxime eius, nobis perferendis vel rem hic nesciunt, reiciendis perspiciatis commodi! Accusamus, non beatae voluptate itaque officia, vitae nisi incidunt sunt eius in saepe omnis sint iusto, quaerat at officiis reprehenderit laudantium nam. Magnam doloremque impedit debitis nobis amet ea libero alias repudiandae, veniam ducimus reprehenderit aperiam inventore nam fuga voluptas, error aspernatur consequatur enim dolorem, eius architecto unde doloribus minima! Rerum sed fuga nam ex debitis minus totam vitae laudantium facere nisi. Ratione omnis alias rerum deserunt quaerat quas quia?",
            ],
            [
                "title" => "judul post ketiga",
                "slug"=> "judul-post-ketiga",
                "author" => "samsul setiawan",
                "body" => "perspiciatis nostrum velit dolor vel sed autem harum assumenda atque a eligendi eveniet, eaque sit quos veniam inventore perferendis, eos dignissimos. Culpa enim corporis accusamus aut! Odit magni obcaecati dicta ipsam nobis nesciunt ab amet? Error dolorum rerum magni nostrum amet aperiam, accusamus nobis placeat nihil, veniam laborum quod. Laboriosam doloribus unde atque deserunt consequuntur, sapiente maxime eius, nobis perferendis vel rem hic nesciunt, reiciendis perspiciatis commodi! Accusamus, non beatae voluptate itaque officia, vitae nisi incidunt sunt eius in saepe omnis sint iusto, quaerat at officiis reprehenderit laudantium nam. Magnam doloremque impedit debitis nobis amet ea libero alias repudiandae, veniam ducimus reprehenderit aperiam inventore nam fuga voluptas, error aspernatur consequatur enim dolorem, eius architecto unde doloribus minima! Rerum sed fuga nam ex debitis minus totam vitae laudantium facere nisi. Ratione omnis alias rerum deserunt quaerat quas quia?",
            ]
    ];
    
    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $blog_post = static::all();
        // $new_post= [];


        // foreach($blog_post as $p){
        //     if ($p ["slug"] === $slug){
        //         $new_post = $p;
        //     }
        // }

        // return $new_post;
        return $blog_post->firstWhere('slug', $slug);
    }
}
