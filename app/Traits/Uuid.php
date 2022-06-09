<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait Uuid
{

    // Hook our model and listen to eloquent events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Check if its firs time
            if (!$model->getKey()) {
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    // Check if the tables are incrementing or not
    public function getIncrementing()
    {
        return false;
    }

    // Id should be store as string
    public function getKetType()
    {
        return 'string';
    }
}
