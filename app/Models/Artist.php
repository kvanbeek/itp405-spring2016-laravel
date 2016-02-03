<?php

namespace App\Models;

use DB;

/**
 * Created by PhpStorm.
 * User: davidtang
 * Date: 2/1/16
 * Time: 10:18 PM
 */
class Artist
{
    public function __construct(array $data)
    {
        $this->artist_name = $data['artist_name'];
    }

    public function save()
    {
        DB::table('artists')->insert([
            'artist_name' => $this->artist_name
        ]);
    }

    public static function all()
    {
        return DB::table('artists')
            ->orderBy('artist_name')
            ->get();
    }
}