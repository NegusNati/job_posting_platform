<x-layout>
    <x-slot:heading>
        Position: {{$job['name']}}
    </x-slot:heading>
    <h3> <strong>Job discription</strong></h3>
    <p> {{ $job['description']}}</p>

    <h3><strong>Job Salary</strong></h3>

    <p> &dollar;{{ number_format($job['salary'])}}</p>
</x-layout>
