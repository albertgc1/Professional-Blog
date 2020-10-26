<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
                ->where('published_at', '<=', Carbon::now())
                ->latest('published_at');
    }

    protected $dates = ['published_at'];
}
