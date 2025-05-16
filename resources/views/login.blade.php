<x-main-layout title="Contact">
    @push('styles')
        <link rel="stylesheet" href="{{ secure_asset('css/contact.css') }}">
    @endpush
    <div>
        <form action="/login" method="post"></form>
    </div>
</x-main-layout>
