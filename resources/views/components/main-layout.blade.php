<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rosarivo:ital@0;1&display=swap" rel="stylesheet">
    {{-- custom css --}}
    @vite(['resources/css/app.css'])
    @stack('styles')
    <title>BC Wares | {{ $title }}</title>
</head>

<body>
    {{-- header begin --}}
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == '' ? 'active' : '' }}" aria-current="page"
                                href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'shop' ? 'active' : '' }}"
                                href="/shop">Shop</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::segment(1) == 'vendors' ? 'active' : '' }}"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Vendors
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-center" href="/vendors">Become a vendor</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                    <p class="text-center">Shop current vendors:</p>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center" href="#">vendor 1</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center" href="#">vendor 2</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center" href="#">vendor 3</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'about' ? 'active' : '' }}"
                                href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'contact' ? 'active' : '' }}"
                                href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- header end --}}
    <main>
        <div> {{ $slot }}</div>
    </main>
    <footer class="container-fluid">
        <div class="footer-icons">
            <a href="#"> <i class="bi bi-twitter-x"></i></a>
            <a href="#"> <i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="#"> <i class="bi bi-linkedin"></i></a>
        </div>

        <div class="footer-right">
            <div class="footer-links">
                <ul>
                    <h6>Vendors</h6>
                    <li>
                        <a href="">What it takes to become <br>a vendor
                        </a>
                    <li>
                    <li>
                        <a href="">Vendor policies</a>
                    </li>
                </ul>
            </div>
            <div class="footer-links">
                <ul>
                    <h6>Explore</h6>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="">Terms Of Service</a></li>
                </ul>
            </div>
        </div>

    </footer>
</body>

</html>
