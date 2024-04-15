<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    use HasFactory;
    protected $table = 'job_listings';

    protected $fillable = ['title' , 'description', 'salary'];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listings_id'  );
    }
}
