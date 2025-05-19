<x-main-layout title="Contact">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endpush

    <div class="form-wrapper container">
        <form class="login-form" action="/login" method="post">
            @csrf
            <h2 class="mb-3">Login</h2>
            <input type="text" name="email" class="login-input" placeholder="Email">
            <input type="password" name="password" class="login-input" placeholder="Password">
            <button class="button">Login</button>
        </form>
    </div>
</x-main-layout>
