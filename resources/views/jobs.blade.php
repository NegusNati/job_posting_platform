<x-layout>
    <x-slot:heading>
        Current Jobs List
    </x-slot:heading>
    {{-- <p> the Id is {{ $id }}</p> --}}

    <ul>
        @foreach ( $jobs as $job )
        <li>
            <strong>
                <a href="/jobs/{{$job['id']}}" class="hover:underline text-blue-600">
                    {{$job['name']}}
                </a>
            </strong>
            <p> {{$job['description']}}, it pays &dollar;{{ number_format($job['salary'])}} </p>
        </li>
        @endforeach
    </ul>


</x-layout>
