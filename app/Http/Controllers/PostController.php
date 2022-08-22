<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request; 


class PostController extends Controller
{


    public function adminList(){
        return Inertia::render(('Admin/Posts/AdminList'),[
            'posts'=>Post::withTrashed()->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(('Admin/Posts/Create'),[
            'post'=>new Post()
        ]);
    }


    public function store(PostRequest $request)
    {
        $post = new Post($request->validated());
        $post->save();
        return redirect()->route('admin.posts.update', ['post'=>$post])->with('succeed', 'Článok bol pridaný.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(String $post_slug)
    {
        if(!$post = Post::where('slug', $post_slug)->with('user')->first()){
            return abort(404);
        }
        return Inertia::render('Posts/Show', [
            'post'=>$post,
            'is_liked'=> cookie('post_like_'.$post->id) or cookie('post_like_'.$post->id)!=true ? false : true
        ]);
    }

    public function like(Request $request, Post $post){
        if(empty(cookie('post_like_'.$post->id))){
            $post->increment('likes');
            cookie($name = 'post_like_'.$post->id, $value = true, 60*24*30);
            return redirect()->route('post', ['post_slug'=>$post->slug])->with('succeed', 'Like bol pridaný. Ďakujeme.');
        }else{
            return redirect()->route('post', ['post_slug'=>$post->slug])->with('notice', 'Článok si už likoval.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render(('Admin/Posts/Edit'),[
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->fill($request->validated());
        $post->save();
        return redirect()->route('admin.posts.update', ['post'=>$post])->with('succeed', 'Článok bol upravený.');
    }



    public function restore($post_id){
        $post = Post::withTrashed()->where('id', $post_id)->first();
        $post->restore();
        return redirect()->route('admin.posts')->with('succeed', 'Článok bol obnovený.');
    }

    public function delete(Post $post){
        $post->delete();
        return redirect()->route('admin.posts')->with('succeed', 'Článok bol vymazaný.');
    }
    public function destroy($post_id){
        $post = Post::withTrashed()->where('id', $post_id)->first();
        $post->forceDelete();
        return redirect()->route('admin.posts')->with('succeed', 'Článok bol permanentne vymazaný.');
    }
}
