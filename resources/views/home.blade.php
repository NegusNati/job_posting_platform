<x-layout>
    <x-slot:heading>
        The Home Page
    </x-slot:heading>
    <h2> The Jobs</h2>
    <ul>
        @foreach ( $jobs as $job )
        <li>
          <strong>  {{$job['name']}} </strong>
            <p> {{$job['description']}}, it pays {{$job['salary']}}&dollar; </p>
        </li>
        @endforeach
    </ul>
</x-layout>
