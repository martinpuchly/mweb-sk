<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'tags', 'intro', 'text', 'views', 'likes', 'user_id', 'published', 'published_at', 'description', 'keywords'];
    protected $appends = ['create_hum', 'tag_array'];

    public function user(){
        return $this->belongsTo(User::class);
    }



    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<', now())->orWhere('published', 1);
    }



    public function getCreateHumAttribute(){
        Carbon::setLocale('sk');
        return $this->created_at ? $this->created_at->diffForHumans() : null;
    }

    public function getTagArrayAttribute(){
       return explode(",", $this->tags);
    }

}
