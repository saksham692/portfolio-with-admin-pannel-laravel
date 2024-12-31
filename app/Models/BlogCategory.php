<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_blog_category');
    }

    public function getAllChildCategories()
    {
        $childCategories = collect($this->children);

        foreach ($this->children as $child) {
            $childCategories = $childCategories->merge($child->getAllChildCategories());
        }

        return $childCategories;
    }

    public function getTotalBlogs()
    {
        // Get the blogs directly associated with this category
        $blogs = $this->blogs;

        // Initialize an array to store unique blog IDs
        $blogIds = $blogs->pluck('id')->toArray();

        // Loop through child categories
        foreach ($this->children as $child) {
//            // Get blogs for the child category
            $childBlogs = $child->blogs()->pluck('blogs.id')->toArray();
//
//            // Merge the child blog IDs with the parent, ensuring no duplicates
            $blogIds = array_merge($blogIds, $childBlogs);
        }

        // Remove duplicates by making the blog IDs unique
        $uniqueBlogIds = array_unique($blogIds);

        // Return the count of unique blog IDs
        return count($uniqueBlogIds);
//        return implode(',', $blogIds);
    }

}
