<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "Post";
    public $timestamps = false;
    protected $primaryKey = "IdPost";


    public function user()
    {
        return $this->belongsTo(User::class, "IdUser");
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class,"IdPost");
    }

}
