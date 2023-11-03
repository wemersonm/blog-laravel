<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $table = "User";
    protected $primaryKey = "IdUser";

    protected $fillable = [
        'Username',
        'UserFullname',
        'UserBio',
        'Email',
        'Password',
        'UserImage',
        'Active',
        'CreatedAt',
        'UpdatedAt',
    ];

    protected $hidden = [
        'Password',
        'CreatedAt',
        'UpdatedAt'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class,'IdUser');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class,'IdUser');
    }
}
