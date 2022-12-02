<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request; 
use Illuminate\Support\Str;
use Image;


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
    public function index($tag = "")
    {
        return Inertia::render(('Posts/Index'),[
            'posts'=>Post::when($tag, function ($query, $tag) {
                                $query->where('tags', 'like', '%'.$tag.'%');
                            })->orderBy('created_at', 'DESC')->published()->paginate(5)
        ]);
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
        $post->published = $request->published == 'true' ? 1 : 0;
        $post->published_at = date("Y-m-d H:i:s", strtotime($request->published_at));
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
        if(!$post = Post::where('slug', $post_slug)->published()->with('user')->first()){
            return abort(404);
        }
        return Inertia::render('Posts/Show', [
            'post'=>$post,
            'is_liked'=> cookie('post_like_'.$post->id) or cookie('post_like_'.$post->id)!=true ? false : true
        ]);
    }

    public function like(Request $request, Post $post){
        
        if(!$request->session()->exists('post_like_'.$post->id)){
            $post->increment('likes');
            $request->session()->put('post_like_'.$post->id, );
            return redirect()->route('post', ['post_slug'=>$post->slug])->with('succeed', 'Like bol pridaný. Ďakujeme.');
        }else{
            return redirect()->route('post', ['post_slug'=>$post->slug])->with('notice', 'Článok už má tvoj like.');
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
        $post->published = $request->published == 'true' ? 1 : 0;
        $post->published_at = date("Y-m-d H:i:s", strtotime($request->published_at));
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



    public function upload_images(Request $request)
    {
        if($request->file('image')->getClientOriginalName()!="") {
            $image = Image::make($request->file('image'));

            //RESIZE IF WIDTH || HEIGHT > 450
            if($image->width()>450 or $image->height()>450){
                $image->resize(450, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            //SAVE
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = Str::random(7).'_'.time().'.'.$extension;
            $image->save(public_path('images/posts/'), $fileName);

            $url = asset('images/posts/'.$fileName); 
            return response()->json(['url'=>$url]);
        }else{
            error_log("nemáme file!");
        }
    }
}
