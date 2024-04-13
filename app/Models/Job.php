<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class Job extends Model
{
    protected $table = 'job_listings';







    // public static function find(int $id)
    // {

    //     $job =  Arr::first(static::all(), fn ($job) => $job['id'] == $id);

    //     if (!$job) { //is $job == null (meaning the $jobs array doesn't have it)
    //         return abort(404, "No such job");
    //     }

    //     return $job;
    // }
}
