<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    //
    protected $fillable = [
        'title',
        'slug'
    ];

    public function articles()
    {
        //satu category memiliki banyak article
        return $this->hasMany(Article::class);
    }
}
