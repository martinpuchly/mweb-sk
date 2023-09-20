<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Joke extends Model
{
    use HasFactory;

    protected $fillable = ['text'];
    protected $appends = ['text_show'];


    protected function textShow(): Attribute
    {
        return Attribute::make(
            get: fn () => nl2br($this->text)
        );
    } 

}
