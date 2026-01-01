<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Condition;

class Item extends Model
{
    use HasFactory;
    public function likes()
    {
    return $this->hasMany(\App\Models\Like::class);
    }
    public function likedUsers()
    {
    return $this->belongsToMany(User::class, 'likes');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
}
