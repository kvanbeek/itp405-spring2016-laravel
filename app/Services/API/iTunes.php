<?php

namespace App\Services\API;
use Cache;

class iTunes {
    public function getArtist($artistUrl)
    {
        if (Cache::get($artistUrl)) {
            $artist = Cache::get($artistUrl);
        } else {
            $artist = $this->artistUrl($artistUrl);
            Cache::put($artistUrl, $artist, 30);
            return $artist;
        }


        $jsonArtist = json_decode($artist);

        return $jsonArtist;

    }

    protected function artistUrl($artistUrl)
    {
        $jsonString = file_get_contents($artistUrl);
        return $jsonString;
    }
}