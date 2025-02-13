<?php

namespace App\Models;

trait Sluggable
{
    public static function bootSluggable()
    {
        static::creating(function ($model) {
            $model->slug = \Str::slug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = \Str::slug($model->title);
        });
    }
}
