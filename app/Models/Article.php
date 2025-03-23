<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'article_category_id'
    ];
    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
