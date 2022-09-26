<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'body', 'created_at', 'updated_at'];
    protected $appends = ['update_hum'];

    public function getUpdateHumAttribute(){
        if($this->updated_at)
        {
            Carbon::setLocale('sk');
            return $this->updated_at->diffForHumans();
        }
        return "-";
    }
    
    
}
