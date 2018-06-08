<?php
/**
 * Created by PhpStorm.
 * User: han
 * Date: 2018/6/8
 * Time: 15:21
 */

namespace App\Observers;

use App\Models\Link;
use Cache;
use Log;

class LinkObserver
{
    public function saved(Link $link)
    {
        Log::INFO('cache_key:'.$link);
        Cache::forget($link->cache_key);
    }

}