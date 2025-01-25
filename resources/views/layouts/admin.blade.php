<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="icon" href="{{ asset('logo/nilam.png') }}" type="image/png">

    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7ie2D44Nyh/a6xoXmj8lztF5dY3Nck1BQHs" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for Sidebar -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            width: 100%;
        }

        .sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding-left: 0;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar a.active {
            /* background-color: #495057; */
            font-weight: bold;
        }

        .main-content {
            width: 100%;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-logout {
            background-color: red;
            color: white;
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 14px;
        }

        .form-control-search {
            height: 40px;
        }

        .box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>

    @yield('styles') <!-- For any additional page-specific CSS -->
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header" style="text-align: center;">
                <h4 class="p-3">Nilam</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mt-3">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>
                <li class="nav-item mt-3">
                    <a href="{{ route('admin.users') }}"
                        class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">Users</a>
                </li>
                <li class="nav-item mt-3">
                    <a href="{{ route('admin.sellers') }}"
                        class="nav-link {{ request()->is('admin/sellers') ? 'active' : '' }}">Seller</a>
                </li>
                <li class="nav-item mt-3">
                    <a href="{{ route('admin.add') }}"
                        class="nav-link {{ request()->is('admin/add') ? 'active' : '' }}">Add New Admin</a>
                </li>
                <li class="nav-item mt-3">
                    <a href="javascript:void(0);" class="nav-link" id="manageProductsToggle">Manage Auctions</a>
                    <ul class="nav flex-column ml-3" id="manageProductsDropdown" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.auc-approve') }}"
                                class="nav-link {{ request()->is('admin/auction-approve') ? 'active' : '' }}">Auction Approval</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.auc-status') }}"
                                class="nav-link {{ request()->is('admin/auction-status') ? 'active' : '' }}">Auction Status</a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ route('admin.bids') }}"
                        class="nav-link {{ request()->is('admin/bids') ? 'active' : '' }}">Current Items Biddings</a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ route('admin.payment-approval') }}"
                        class="nav-link {{ request()->is('admin/payment-approval') ? 'active' : '' }}">Payment Approval</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mt-3">
                    <a href="{{ route('profile.update') }}" class="btn btn-outline-secondary w-100">Update Profile</a>
                </li>
                <li class="nav-item mt-5">
                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                        @csrf
                        <button type="submit" class="btn btn-logout w-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">


            <!-- Main Dashboard Content -->
            <div class="container mt-4">
                @yield('content') <!-- This is where the page content will be injected -->
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kaHTS3waUS5r5kTE6rbZV0Dhl3ngsZdcS7HX/JvWbKndYP1pc2QBxjRrxRRyGdHQ" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('manageProductsToggle');
            const dropdown = document.getElementById('manageProductsDropdown');

            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>
    @yield('scripts') <!-- For any additional page-specific JS -->
</body>

</html>