@extends('layouts.admin')

@section('title', 'Admin Profile')

@section('styles')
<style>
    .profile-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 20px);
        background: linear-gradient(135deg, #c7c6c0 0%, #858281 100%);
    }
    .profile-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
        max-width: 500px;
        padding: 30px;
    }
    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #fda085;
        margin-bottom: 20px;
    }
    .profile-name {
        font-size: 28px;
        color: #333;
        margin-bottom: 5px;
    }
    .profile-role {
        font-size: 18px;
        color: #666;
        font-style: italic;
    }
    .profile-info {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    .info-item {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    .info-label {
        font-weight: bold;
        width: 120px;
        color: #fda085;
    }
    .info-value {
        flex: 1;
        color: #333;
    }
</style>
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <img src="https://t4.ftcdn.net/jpg/02/27/45/09/360_F_227450952_KQCMShHPOPebUXklULsKsROk5AvN6H1H.jpg" alt="Admin" class="profile-image">
            <h2 class="profile-name">{{ $admin->name }}</h2>
            <p class="profile-role">Administrator</p>
        </div>
        <div class="profile-info">
            <div class="info-item">
                <span class="info-label">Username:</span>
                <span class="info-value">{{ $admin->username }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $admin->email }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Member Since:</span>
                <span class="info-value">{{ $admin->created_at->format('F d, Y') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
