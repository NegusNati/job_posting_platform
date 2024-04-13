<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    use HasFactory;
    protected $table = 'job_listings';

    protected $fillable = ['title' , 'description', 'salary'];







    // public static function find(int $id)
    // {

    //     $job =  Arr::first(static::all(), fn ($job) => $job['id'] == $id);

    //     if (!$job) { //is $job == null (meaning the $jobs array doesn't have it)
    //         return abort(404, "No such job");
    //     }

    //     return $job;
    // }
}
