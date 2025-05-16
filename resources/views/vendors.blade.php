<x-main-layout title="Vendors">
    @push('styles')
        <link rel="stylesheet" href="{{ secure_asset('css/vendors.css') }}">
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
            <button><a href="#vendor-form">Register as a vendor</a></button>
        </div>
        <div id="vendor-form" class="vendor-form-wrapper">
            <form class="vendor-form" action="/register" method="POST">
                @csrf
                <h5>Register to become a vendor</h5>
                <input class="form-input" type="text" name="firstName" placeholder="First Name">
                <input class="form-input" name="lastName" type="text" placeholder="Last Name">
                <input class="form-input" name="email" type="text" placeholder="Email">
                <input class="form-input" name="password" type="password" placeholder="Password">
                <input class="form-input" name="password_confirmation" type="password" placeholder="Confirm password">
                <input class="form-input" name="address" type="text" placeholder="Street / House Number">
                <input class="form-input" name="addresslinetwo" type="text" placeholder="Apt #">
                <input class="form-input" name="addresslinethree" type="text" placeholder="Address line 3">
                <span class="state-zip">
                    <select class="form-select" name="state" id="">
                        <option>State</option>
                        <option value="state">State</option>
                        <option value="state">State</option>
                        <option value="state">State</option>
                        <option value="state">State</option>
                        <option value="state">State</option>
                        <option value="state">State</option>
                    </select>
                    <input class="form-input" name="postcode" type="text" placeholder="Postalcode">
                </span>
                <input class="form-input" name="business" type="text" placeholder="Business Name">
                <select class="form-select" name="producttype" id="">
                    <option>Product Type</option>
                    <option value="1">type</option>
                    <option value="2">type</option>
                    <option value="3">type</option>
                    <option value="4">type</option>
                </select>
                <div class="form-check">
                    <input class="form-check-input" name="policy" type="checkbox" value="1" id="flexCheckDefault">
                    <label class="form-check-label" name="firstName" for="flexCheckDefault">
                        I've read BC Wares <strong><a href="#">Privacy Policy</a></strong>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="terms" type="checkbox" value="1" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        I've read BC Wares <strong><a href="#">terms of Service</a></strong>
                    </label>
                </div>
                <button type="submit" class="register-button">Register</button>
            </form>
        </div>
    </div>

</x-main-layout>
