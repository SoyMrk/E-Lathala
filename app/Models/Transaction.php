<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'post_id',
        'bought_by_id',
        'sold_by_id',
        'completed_at',
        'cancelled_at',
    ];

   
    public function bought_by()
    {
        return $this->belongsTo(User::class,'bought_by_id');
    }

    public function sold_by()
    {
        return $this->belongsTo(User::class,'sold_by_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
