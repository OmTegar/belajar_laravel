<?php

namespace App\Http\Controllers;
// use app\Models\category;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\model1;
use App\Models\post;

class PostControler extends Controller
{   
    
    public function index(){ 
        // $posts=post::latest();

        // dd(request('search'));
        return view('postingan', [
            "title"=> "BLOG", 
            // "posts"=> post::all(),
            // "posts"=> post::with(['user','category'])->latest()->get()
            // "posts"=> $posts->get(),
            "posts"=> post::latest()
            ->filter(request(['search', 'category']))
            ->paginate(8),
            "active"=>"posts"
            // "name_category"=> category::all()

        ]);
    }

    public function show(post $post) {
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
