<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'post_type',
        'title',
        'condition',
        'category',
        'price'
    ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function owner(User $user)
    {
        return $user->id === $this->user_id;
    }

    public function boughtBy(User $user)
    {
        return $this->transactions->contains('bought_by_id', $user->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'post_id');
    }

}
