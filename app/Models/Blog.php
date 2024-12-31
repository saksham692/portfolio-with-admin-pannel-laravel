<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Spatie\Sluggable\HasSlug;
//use Spatie\Sluggable\SlugOptions;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'parent_id', 'title', 'slug',
        'description', 'content', 'meta_keywords',
        'meta_image', 'published', 'published_at',
        'allow_comments',
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_blog_category');
    }

//    public function getSlugOptions(): SlugOptions
//    {
//        // TODO: Implement getSlugOptions() method.
//        return SlugOptions::create()
//            ->generateSlugsFrom('title') // Field to generate the slug from
//            ->saveSlugsTo('slug');
//    }
}
