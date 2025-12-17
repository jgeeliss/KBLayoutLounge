@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1>User Management</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>User Alias</th>
                    <th>Email</th>
                    <th>Joined</th>
                    <th>Admin Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->user_alias }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td>
                            @if ($user->is_admin)
                                <span class="badge badge-success">Admin</span>
                            @else
                                <span class="badge badge-secondary">User</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->id !== auth()->id())
                                <form method="POST" action="{{ route('users.toggleAdmin', $user) }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $user->is_admin ? 'btn-warning' : 'btn-primary' }}">
                                        {{ $user->is_admin ? 'Revoke Admin' : 'Make Admin' }}
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">(You)</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
