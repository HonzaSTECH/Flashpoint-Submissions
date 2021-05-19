@extends('base')

@section('title', 'List of users')
@section('description', 'List of all users using this website')

@section('content')
    <table class="table table-striped table-bordered table-responsive-md">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Permission Level</th>
            <th>Registration Date</th>
            <th>Submitted Curations</th>
            <th>Accepted Curations</th>
            <th>Requested fixes</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>
                    <a href="{{ route('user.show', ['user' => $user]) }}">
                        {{ $user->name }}
                    </a>
                </td>
                <td>{{ $user->permission_level }}</td>
                <td>{{ $user->created_at }}</td>
                <td>TODO</td>
                <td>TODO</td>
                <td>TODO</td>
                <td>
                    <a class="text-success" href="#" onclick="event.preventDefault(); $('#user-promote-{{ $user->user_id }}').submit();">Promote</a>
                    <a class="text-secondary" href="#" onclick="event.preventDefault(); $('#user-demote-{{ $user->user_id }}').submit();">Demote</a>
                    <a class="text-danger" href="#" onclick="event.preventDefault(); $('#user-delete-{{ $user->user_id }}').submit();">Delete</a>

                    <form action="{{ route('user.update', ['user' => $user]) }}" method="POST" id="user-promote-{{ $user->user_id }}" class="d-none">
                        @csrf
                        <input type="hidden" name="action" value="+" />
                        @method('PUT')
                    </form>

                    <form action="{{ route('user.update', ['user' => $user]) }}" method="POST" id="user-demote-{{ $user->user_id }}" class="d-none">
                        @csrf
                        <input type="hidden" name="action" value="-" />
                        @method('PUT')
                    </form>

                    <form action="{{ route('user.destroy', ['user' => $user]) }}" method="POST" id="user-delete-{{ $user->user_id }}" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    No user registered so far.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
