<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need some information and it will be displayed
                    publicly so be careful what
                    you share.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>

                        <x-form-label for="title">Title Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" autocomplete="title" placeholder="Software Engineer"
                                required />
                        </div>
                        <x-form-error name="title"></x-form-error>
                    </x-form-field>

                    <x-form-field>

                        <x-form-label for="salary">Salary Per year</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="number" name="salary" id="salary" autocomplete="salary"
                                placeholder="90000" required />
                        </div>
                        <x-form-error name="salary"></x-form-error>
                    </x-form-field>

                    <div class="col-span-full">
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                required>{{old('description')}}</textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences describing the Job, and
                            related
                            benefits.</p>

                        <x-form-error name="description"></x-form-error>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <x-form-button>Save</x-form-button>
                </div>
    </form>
</x-layout>
