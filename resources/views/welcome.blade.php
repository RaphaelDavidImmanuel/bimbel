<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Private Depok</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            MyWebsite
        </div>

        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-login">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn-login">
                    Login
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Welcome To My Website</h1>
            <p>
                Website modern menggunakan Laravel + custom CSS.
            </p>

            <a href="#" class="hero-btn">
                Explore Now
            </a>
        </div>

        <div class="hero-image">
            <img src="{{ asset('img/hero.png') }}" alt="Hero Image">
        </div>
    </section>

</body>

</html>
