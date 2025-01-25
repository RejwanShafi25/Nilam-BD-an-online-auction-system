@extends('layouts.admin')

@section('title', 'Add New Admin')

@section('styles')
<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 100px); /* Adjust based on your navbar height */
    }
    .form-box {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 400px;
    }
    .admin-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 1rem;
        object-fit: cover;
    }
    .form-box input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }
    .form-box button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .form-box button:hover {
        background-color: #0056b3;
    }
</style>
@endsection

@section('content')
<div class="form-container">
    <div class="form-box">
        <img src="https://t4.ftcdn.net/jpg/02/27/45/09/360_F_227450952_KQCMShHPOPebUXklULsKsROk5AvN6H1H.jpg" alt="Admin" class="admin-image">
        <h2 class="mb-4">Add New Admin</h2>
        <form action="{{ route('admin.register') }}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <!-- Hidden field to set the role to 2 for admin -->
            <input type="hidden" name="role" value="2">

            <button type="submit" class="btn btn-primary">Register Admin</button>

        </form>
    </div>
</div>
@endsection
