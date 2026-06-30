<?php

namespace App\Models;

use Illuminate\Console\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'name', 
    'location', 
    'documentation', 
    'owner', 
    'architect', 
    'longitude', 
    'latitude', 
    'progress_project', 
    'status',
    'password',
    'youtube',
    'sm',
    'supervisor',
    'drafter',
])]

#[Hidden([
    'password'
])]
class Project extends Model
{

    public function getYoutubeEmbedUrlAttribute()
    {
        if (!$this->youtube) {
            return null;
        }

        $url = $this->youtube;
        $videoId = '';

        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?|shorts)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $match)) {
            $videoId = $match[1];
        }

        return $videoId ? 'https://www.youtube.com/embed/' . $videoId : $url;
    }
}
