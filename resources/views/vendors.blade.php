<x-main-layout title="Vendors">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/vendors.css') }}">
    @endpush
    <div>
        <div class="top-content">
            <h2>Becoming a vendor</h2>
            <p>
                As a vendor you are very important. You are the artist, crafts-person, farmer, designer...but, most of
                all you are local. Supporting small businesses like yours is our main mission. Putting sales into the
                local market helps not only local business, but the entire community. This is why you should consider
                selling with BC Wares.
            </p>
        </div>
        <div class="call-to-action">
            <h2>Register to start selling!</h2>
            <button><a href="#vendor-form">Sign up as a vendor</a></button>
        </div>
        <div id="vendor-form" class="vendor-form-wrapper">
            <form class="vendor-form" action="#">
                <h5>Register to become a vendor</h5>
                <input class="form-input" type="text" placeholder="First Name">
                <input class="form-input" type="text" placeholder="Last Name">
                <input class="form-input" type="text" placeholder="Email">
                <input class="form-input" type="text" placeholder="Street / House Number">
                <input class="form-input" type="text" placeholder="Apt #">
                <input class="form-input" type="text" placeholder="Address line 3">
                <span class="state-zip">
                    <select class="form-select" name="" id="">
                        <option>State</option>
                    </select>
                    <input class="form-input" type="text" placeholder="Postalcode">
                </span>
                <input class="form-input" type="text" placeholder="Business Name">
                <select class="form-select" name="" id="">
                    <option>Product Type</option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I've read BC Wares <strong><a href="#">Privacy Policy</a></strong>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        I've read BC Wares <strong><a href="#">terms of Service</a></strong>
                    </label>
                </div>
                <button class="register-button">Register</button>
            </form>
        </div>
    </div>
    </div>
</x-main-layout>
