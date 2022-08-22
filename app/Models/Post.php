<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'tags', 'intro', 'text', 'views', 'likes', 'user_id'];
    protected $appends = ['create_hum'];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function getCreateHumAttribute(){
        Carbon::setLocale('sk');
        return $this->created_at->diffForHumans();
    }
}
