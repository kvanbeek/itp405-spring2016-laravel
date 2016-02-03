<?php

namespace App\Models;

use DB;

/**
 * Created by PhpStorm.
 * User: davidtang
 * Date: 2/1/16
 * Time: 10:18 PM
 */
class Dvd
{
    public function __construct(array $data)
    {
        $this->artist_name = $data['title'];
    }

    public function save()
    {
        DB::table('dvds')->insert([
            'title' => $this->title
        ]);
    }

    public static function all()
    {
        return DB::table('dvds')
            ->orderBy('title')
            ->get();
    }
}