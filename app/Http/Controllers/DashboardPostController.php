<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dasboards.posts.index', [
            'posts' => post::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dasboards.posts.create', [
            'categories' => category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validateData = $request ->validate([
            'title' => 'required|max:255',
            'slug' => 'unique:posts',
            'category_id' => 'required',
            'image'=>'image|file|max:1024',
            'body' => 'required|min:10'
        ]);

        if ($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = str::limit(strip_tags($request->body),50);

        post::create($validateData);

        return redirect('/dasboards/posts')->with('success', 'Postingan Baru Berhasil Ditambahkan ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('dasboards.posts.show' , [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dasboards.posts.edit' , [
            'categories' => category::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            // 'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required|min:10'
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'unique:posts';
        }

        $validateData = $request->validate($rules);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = str::limit(strip_tags($request->body),100);

        post::where('id', $post->id)
        ->update($validateData);

        return redirect('/dasboards/posts')->with('success', 'Postingan Anda Berhasil diupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        post::destroy($post->id);
        return redirect('/dasboards/posts')->with('success', 'Postingan Behasil Di hapus ');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug',  $request->title);
        return response()->json(['slug' =>$slug]);
    }
    
}
