@extends('layouts.app')

@section('content')
    <div>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1>User Management</h1>
            <a href="{{ route('users.create') }}" class="button">Create New User</a>
        </div>

        <table>
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
                                <span>Admin</span>
                            @else
                                <span>User</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->id !== auth()->id())
                                <form method="POST" action="{{ route('users.toggleAdmin', $user) }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="{{ $user->is_admin ? 'btn-delete-small' : 'btn-primary-small' }}">
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
