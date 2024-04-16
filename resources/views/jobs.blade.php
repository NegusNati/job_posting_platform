<x-layout>
    <x-slot:heading>
        Current Jobs List
    </x-slot:heading>
    {{-- <p> the Id is {{ $id }}</p> --}}

    <div class="space-y-4">
        @foreach ( $jobs as $job )

        <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg ">

            <strong> {{$job['title']}}</strong>
            <i> {{ $job->employer['name']}} </i>
            <p> {{$job['description']}}, it pays &dollar;{{ number_format($job['salary'])}} </p>
        </a>
        @endforeach
    </div>
    <div>
        {{ $jobs->links() }}
    </div>

</x-layout>
