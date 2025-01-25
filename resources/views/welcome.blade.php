<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilam</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: white;
            color: #333;
        }
        .navbar {
            background-color: #f8f9fa;
            padding: 15px 30px;
            border-bottom: 1px solid #e7e7e7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }
        .navbar a:hover {
            color: #007bff;
        }
        .hero {
            position: relative;
            padding: 100px 30px;
            text-align: center;
            color: white;
            background-image: url('https://plus.unsplash.com/premium_photo-1661940814738-5a028d647d3a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YXVjdGlvbnxlbnwwfHwwfHx8MA%3D%3D'); /* Add your image URL here */
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* To give a parallax effect */
            min-height: 100vh; /* Make the background cover full height */
            z-index: 1;
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% transparency */
            z-index: -1;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
            
        }
        .hero p {
            font-size: 18px;
            margin: 20px auto;
            max-width: 800px;
            line-height: 1.6;  
        }
        
        .btn {
            background-color: #009bab;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid #e7e7e7;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        @if(auth()->check())
            <div class="menu">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @else
            <div class="logo">
                <a href="/register">Register</a>
            </div>
            <div class="menu">
                <a href="/login">Login</a>
            </div>
        @endif
    </div>

    
    <!-- Hero Section -->
    <div class="hero">
        
        <h1>Nilam: An Online Auction System</h1>
        <p>Welcome to Bangladesh’s Premier Online Auction Platform. Nilam is your gateway to discovering incredible deals through online auctions. Whether you're looking to buy or sell, our platform connects you with a wide range of products, from electronics to fashion, home goods, and more, all from the comfort of your home. Designed specifically for Bangladesh, Nilam empowers individuals and businesses to participate in a transparent, secure, and user-friendly auction experience. Bid confidently, knowing that each auction is handled with integrity and care. With Nilam, you can find unbeatable deals, rare items, and unique opportunities, all while joining a thriving community of buyers and sellers. Start bidding today and explore the future of auctions in Bangladesh with Nilam!</p>
        <a href="/dashboard" class="btn">Browse Auctions</a>
    </div>
    

</body>
</html>