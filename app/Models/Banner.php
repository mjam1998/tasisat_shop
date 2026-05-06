<?php

namespace App\Models;

use App\Enums\BannerType;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
      'type',
      'meta_title',
      'meta_description',
      'image',
      'image_alt',
      'image_title',
    ];

    protected $casts = [
      'type'=>BannerType::class,
    ];
}
