<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->latest()->paginate(10); //loding data with eager loading insted of lazy loading
    return view('jobs.index',  [
        "jobs" => $jobs
    ]);
    }
    public function create(){
        return view('jobs.create');
    }
    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }
    public function store(){

    request()->validate(
        [
            'title' => ['required', 'string', 'min:4'],
            'salary' => ['required', 'digits_between:4,7'],
            'description' => ['required', 'min:10'],
        ]
    );


    Job::create([
        'employer_id' => 1,
        'title' => request('title'),
        'salary' => request('salary'),
        'description' => request('description'),
    ]);
    return redirect('/jobs');
    }
    public function edit(Job $job)
    {


        // if user is not logged in redirect to login
        if(Auth::guest()){
            return redirect('/login'); 
        }

        if($job->employer->user->isNot(Auth::user())){
            abort(403, "An authorized action!");
        }


        return view('jobs.edit', [
            'job' => $job
        ]);
    }
    public function update(Job $job)
    {
 //authorization (on hold....)

    //validation
    request()->validate(
        [
            'title' => ['required', 'string', 'min:4'],
            'salary' => ['required', 'digits_between:4,7'],
            'description' => ['required', 'min:10'],
        ]
    );

    $job->update(
        [
            'title' => request('title'),
            'salary' => request('salary'),
            'description' => request('description'),
        ]
    );
    return redirect("/jobs/" . $job->id);

    }
    public function destroy(Job $job){
        $job->delete();
        //redirect
        return redirect('/jobs');

    }
}
