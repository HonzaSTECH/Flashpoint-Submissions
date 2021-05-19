@extends('base')

@section('title', 'Sign Up')
@section('description', 'Create a new account to submit curations for Flashpoint')

@section('content')
    <h1>Log In</h1>
    <form action="{{ route('user.auth') }}" method="POST" class="text-center">
        @csrf
        <input class="text-center" name="login" type="text" maxlength="255" placeholder="Username or e-mail" value="{{ old('login') }}"/><br>
        <input class="text-center" name="password" type="password" maxlength="255" placeholder="Password"/><br>
        <input class="text-center" type="submit" value="Log In" /><br>
        <small class="text-center" >Forgot your password? <a href="#">Reset it</a></small><br>
        <small class="text-center" >Don't have an account yet? <a href="{{ route('user.register') }}">Create one</a></small><br>
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
