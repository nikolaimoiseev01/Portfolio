<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Work extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'order',
        'title',
        'desc_card',
        'desc_full',
        'text_detailed_1',
        'text_detailed_2',
        'link',
        'stacks'
    ];

    protected $casts = [
        'stacks' => 'array',
    ];
}
