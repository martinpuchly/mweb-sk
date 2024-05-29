<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use App\Models\Joke;

class HomeController extends Controller
{
    
    public function index(): InertiaResponse
    {
        return Inertia::render('Home/Index', [
            'title_head' => Page::where('slug', 'title-head')->first(),
            'posts'=>Post::orderBy('published_at', 'DESC')->with(['user' => function ($query) {
                                $query->select('id', 'name');
                            }])
                            ->publish()
                            ->take(1)->get(),
        ]);
    }


}
