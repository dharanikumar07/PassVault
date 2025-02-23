<?php

namespace App\Traits;

use Illuminate\Support\Str;


trait UuidTrait
{
    protected static function bootUuidTrait()
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }
    public static function findByUuid($uuid)
    {
        return self::where('uuid', $uuid)->firstOrFail();
    }
}
