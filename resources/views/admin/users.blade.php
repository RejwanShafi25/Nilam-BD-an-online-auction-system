@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>All Users</h2>
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
                @if ($normalUsers->isNotEmpty())
                @foreach ($normalUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><!-- Delete Form -->
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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