<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "PostComment";
    protected $primaryKey = "IdPostComment";

    public function user()
    {
        return $this->belongsTo(User::class, 'IdUser');
    }

    public function post()
    {
        return $this->belongsTo(Post::class,"IdPost");
    }

}
