<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    // from the database 'comlumn table'
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'navbar_status',
        'status',
        'created_by',
    ];

    // delete all related post(child) when deleting the category(parent)
    // return $this->hasMany(child_model,'foreign_key', 'primary key');
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
