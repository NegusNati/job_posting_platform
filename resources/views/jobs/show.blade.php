<x-layout>
    <x-slot:heading>
        {{ $job['title'] }}
    </x-slot:heading>
    <div>


        <h3> <strong>Job discription</strong></h3>
        <p> {{ $job['description'] }}</p>

        <h3><strong>Job Salary</strong></h3>

        <p> &dollar;{{ number_format($job['salary']) }}</p>
        <h3><strong>Company</strong></h3>

        <p>{{ $job->employer->name }}</p>
    </div>

    @can('edit', $job)
        <div class="mt-8 mr-2 text-right ">
            <x-button href="/jobs/edit/{{ $job->id }}">
                Edit Job
            </x-button>
        </div>
    @endcan


</x-layout>
