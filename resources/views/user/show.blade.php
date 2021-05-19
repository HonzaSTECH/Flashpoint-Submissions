@extends('base')

@section('title', $user->name.'\'s Profile')
@section('description', 'Profile data of user '.$user->name)

@section('content')
    <h1>{{ $user->name }}</h1>
    <p>Your permission level: <b>{{ $user->permission_level }}</b></p>
@endsection
