<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'category', 'description', 'image'];

    protected static function booted()
    {
        static::saved(fn () => \Artisan::call('export'));
        static::deleted(fn () => \Artisan::call('export'));
    }
}
