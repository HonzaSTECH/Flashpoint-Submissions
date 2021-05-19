@extends('base')

@section('title', 'Sign Up')
@section('description', 'Create a new account to submit curations for Flashpoint')

@section('content')
    <h1>Sign Up</h1>
    <form action="{{ route('user.create') }}" method="POST" class="text-center">
        @csrf
        <input class="text-center" name="name" type="text" maxlength="255" placeholder="Username" value="{{ old('name') }}" /><br>
        <input class="text-center" name="email" type="email" maxlength="255" placeholder="E-mail address" value="{{ old('email') }}" /><br>
        <input class="text-center" name="password" type="password" maxlength="255" placeholder="Password"/><br>
        <input class="text-center" type="submit" value="Sign Up" /><br>
        <small class="text-center" >Already have an account? <a href="{{ route('user.auth') }}">Log In</a></small>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
