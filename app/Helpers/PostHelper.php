<?php

namespace App\Helpers;

use App\Post;
use Illuminate\Support\Carbon;

class PostHelper
{
    public static function getDate(Post $post)
    {
        $date = $post->date;
        $formattedDate = Carbon::parse($date)
            ->format('F d, Y');

        return $formattedDate;
    }
}
