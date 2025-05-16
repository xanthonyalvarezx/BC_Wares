<x-main-layout title="Contact">
    @push('styles')
        <link rel="stylesheet" href="{{ secure_asset('css/contact.css') }}">
    @endpush
    <div>
        <div class="form-wrapper">
            <h2>Contact</h2>
            <div class="form-div">
                <form class="contact-form" action="" method="post">
                    <input type="text" name="firstName" placeholder="First Name">
                    <input type="text" name="lastName" placeholder="Last Name">
                    <input type="text" name="Email" placeholder="Email">
                    <textarea name="messageBody" id="" cols="25" rows="8" placeholder="Add your mesage..."></textarea>
                </form>
            </div>

        </div>
    </div>
</x-main-layout>
