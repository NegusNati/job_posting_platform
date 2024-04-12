<?php

namespace App\Models;

use Illuminate\Support\Arr;


class Job
{

    public static function all(): array
    {
        return  [
            [
                "id" => 1,
                "name" => "Devloper",
                "description" => "Web Developer, UI/UX Developer",
                "salary" => "60000"
            ],
            [
                "id" => 2,
                "name" => "Product Manager",
                "description" => "Product Lead and Planning",
                "salary" => "70000"
            ],
            [
                "id" => 3,
                "name" => "CTO",
                "description" => "Chief Technology Officer and Engineer",
                "salary" => "100000"
            ],
        ];
    }





    public static function find(int $id)
    {

        $job =  Arr::first(static::all(), fn ($job) => $job['id'] == $id);

        if (!$job) { //is $job == null (meaning the $jobs array doesn't have it)
            return abort(404, "No such job");
        }

        return $job;
    }
}
