<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <script>
        window.addEventListener("DOMContentLoaded", function () {
  const togglePassword1 = document.querySelector("#togglePassword-1");
  const togglePassword2 = document.querySelector("#togglePassword-2");
  const password1 = document.querySelector("#password");
 const password2 = document.querySelector("#password_confirmation");

  togglePassword1.addEventListener("click", function (e) {
    // toggle the type attribute
    const type =
      password1.getAttribute("type") === "password" ? "text" : "password";
    password1.setAttribute("type", type);
    // toggle the eye / eye slash icon
    this.classList.toggle("bi-eye");
  });
  togglePassword2.addEventListener("click", function (e) {
    // toggle the type attribute
    const type =
    password2.getAttribute("type") === "password" ? "text" : "password";
    password2.setAttribute("type", type);
    // toggle the eye / eye slash icon
    this.classList.toggle("bi-eye");
  });


});
    </script>

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
    <form method="POST" action="/register">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base leading-7 text-gray-600 ">Enter your credentials</h2>

                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>

                        <x-form-label for="fname">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="fname" id="fname" autocomplete="name" placeholder="Natnael"
                                required value="{{old('fname')}}"   />
                        </div>
                        <x-form-error name="fname"></x-form-error>
                    </x-form-field>
                    <x-form-field>

                        <x-form-label for="lname">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="lname" id="lname" autocomplete="name" placeholder="Birhanu"
                                required value="{{old('lname')}}"  />
                        </div>
                        <x-form-error name="lname"></x-form-error>
                    </x-form-field>

                    <x-form-field>

                        <x-form-label for="email">Your Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" autocomplete="email"
                                placeholder="negus@laravel.com" required value="{{old('email')}}" />
                        </div>
                        <x-form-error name="email"></x-form-error>
                    </x-form-field>
                    <x-form-field>

                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" autocomplete="password"
                                placeholder="password!password" required />
                            <input type="checkbox" id="togglePassword-1"> Show Password
                        </div>
                        <x-form-error name="password"></x-form-error>
                    </x-form-field>

                    <x-form-field>
                    <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                    <div class="mt-2">
                        <x-form-input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="password!password" required />
                        <input type="checkbox" id="togglePassword-2"> Show Password
                    </div>
                    <x-form-error name="password_confirmation"></x-form-error>

                    </x-form-field>


                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/" class="text-sm font-semibold leading-6 text-gray-900" >Cancel</a>
                    <x-form-button>Register</x-form-button>
                </div>
    </form>
</x-layout>
