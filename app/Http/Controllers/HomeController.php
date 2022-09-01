<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;


class HomeController extends Controller
{
    
    public function index(){
        return Inertia::render('Home/Index', [
            'posts'=>Post::orderBy('created_at', 'DESC')->take(3)->get()
        ]);

    }


}
