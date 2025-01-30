<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'slug']; 
    protected $table = 'categories'; 

    public function posts(){
        return $this->hasMany('App\Models\Posts');
    }

    public function getRouteKeyName(): string
    {
    return 'slug';
    }
}
