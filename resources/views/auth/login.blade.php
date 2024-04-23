<x-layout>
    <x-slot:heading>
       Log In
    </x-slot:heading>
    <script>
        window.addEventListener("DOMContentLoaded", function () {
  const togglePassword1 = document.querySelector("#togglePassword-1");
  const password1 = document.querySelector("#password");

  togglePassword1.addEventListener("click", function (e) {
    // toggle the type attribute
    const type =
      password1.getAttribute("type") === "password" ? "text" : "password";
    password1.setAttribute("type", type);
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
    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base leading-7 text-gray-600 ">Enter your credentials</h2>

                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
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
                            <input type="checkbox" id="togglePassword-1" value="{{old('password')}}"  > Show Password
                        </div>
                        <x-form-error name="password"></x-form-error>
                    </x-form-field>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/" class="text-sm font-semibold leading-6 text-gray-900" >Cancel</a>
                    <x-form-button>Login</x-form-button>
                </div>
    </form>
</x-layout>
