<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use App\Models\Joke;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        if(!Cache::has('joke')){
            if(!$joke = Joke::inRandomOrder()->first())
            {
                $joke='no joke';
            }
            Cache::add('joke', $joke->text_show, now()->addHours(1));
        }
    }


}
