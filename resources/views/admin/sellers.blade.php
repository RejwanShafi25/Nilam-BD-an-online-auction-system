@extends('layouts.admin')
@section('title', 'Seller Management')
@section('content')
<div class="container">
    <h2>All sellers</h2>
    <div class="box">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($sellers->isNotEmpty())
                @foreach ($sellers as $seller)
                <tr>
                    <td>{{ $seller->id }}</td>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $seller->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #f8451f ; color: #000; border-color: #7cd274;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection