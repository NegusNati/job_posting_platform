<x-layout>
        <x-slot:heading>
          {{$job['title']}}
        </x-slot:heading>

    <h3> <strong>Job discription</strong></h3>
    <p> {{ $job['description']}}</p>

    <h3><strong>Job Salary</strong></h3>

    <p> &dollar;{{ number_format($job['salary'])}}</p>
    <h3><strong>Company</strong></h3>

    <p>{{$job->employer->name}}</p>
</x-layout>
