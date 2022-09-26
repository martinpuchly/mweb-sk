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
    protected $appends = ['create_hum', 'tag_array'];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function getCreateHumAttribute(){
        if($this->updated_at)
        {
            Carbon::setLocale('sk');
            return $this->updated_at->diffForHumans();
        }
        return "-";
    }

    public function getTagArrayAttribute(){
       return explode(",", $this->tags);
    }

}
