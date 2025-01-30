<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Posts extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['judul', 'categories_id', 'content', 'gambar', 'slug', 'users_id'];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }

    public function tags()
    {
    return $this->belongsToMany(Tags::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
