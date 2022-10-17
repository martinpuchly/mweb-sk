<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
class QuickNew extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text', 'user_id'];
    protected $appends = ['create_hum'];

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

}
