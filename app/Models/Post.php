<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected  $fillable = [
        "title",
        "slug",
        "extract",
        "body",
        "status",
        "category_id",
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function image()
    {
        return $this->morphOne('App\models\Image', 'imageable');
    }

    // Get SLUG DEFAULT
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
