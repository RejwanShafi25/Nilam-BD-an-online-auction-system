@php
$roleType = Auth::user()->role ?? null;
$redirectUrl = 'dashboard';

switch ($roleType){
case 1: // seller
$redirectUrl = 'seller.dashboard';
break;
case 2: // admin
$redirectUrl = 'admin.dashboard';
break;
default:
$redirectUrl = 'dashboard';
break;
}
@endphp

<style>
    /* Custom styles for the search bar */
    .search-bar {
        width: 100%;
        max-width: 400px;
        border-radius: 50px;
    }

    .search-bar input {
        border-radius: 50px;
    }

    .search-bar button {
        border-radius: 50px;
    }

    .account-dropdown {
        position: relative;
    }

    /* Align logo and text horizontally and center them */
    .brand-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .brand-container img {
        margin-right: 10px;
    }
</style>

<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <!-- Centered Logo and Nilam text -->
        <div class="brand-container mx-auto">
            <a class="navbar-brand d-flex align-items-center" href="{{ route($redirectUrl) }}">
                <img src="{{ asset('logo/nilam.png') }}" alt="Logo" class="rounded-circle" style="width: 45px; height: 45px;">
                <span>Nilam</span> <!-- Nilam text next to the logo -->
            </a>
        </div>

        <!-- Toggler for mobile screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible part of the navbar -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <!-- Search Bar (aligned to the right) -->
            <form action="{{ route('search') }}" method="GET" class="d-flex search-bar ms-auto">
                <input type="text" name="query" class="form-control" placeholder="Search..." aria-label="Search">
                <button type="submit" class="btn btn-outline-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <!-- Right Side with Account Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown account-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownAccountLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user text-orange"></i>
                        <span class="ms-2">Account</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccountLink">
                        @auth
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Update Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('transactions') }}">Your Transactions</a></li>
                        @if (Auth::check() && Auth::user()->role !== 1) <!-- Show "Become a Seller" only if the user is not a seller -->
                        <form method="POST" action="{{ route('become-seller') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning">Become a Seller</button>
                        </form>
                        @endif
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Include Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<!-- Include FontAwesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />