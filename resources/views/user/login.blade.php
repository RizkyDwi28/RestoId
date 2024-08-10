@extends('navbar')

@section('title page', 'Login Page')

@section('content page')
    <div class="container p-5 my-5 mx-auto w-75 bg-light border border-dark rounded-1">
        <div class="row pb-3">
            @if (\Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
                <b>{{ \Session::get('message') }}</b>
            </div>
            @endif
            <h5>Please Sign In</h5>
        </div>
        <div class="row">
            <form action="{{ route('login.action') }}" method="GET">
            @csrf
            <input class="form-control mt-3" value="{{ Cookie::has('emailCookie') ? Cookie::get('emailCookie') : "" }}"
            type="email" name="email" id="emailInsert" placeholder="Email">
            <input class="form-control mt-3" type="password" name="password" id="passwordInsert" placeholder="Password">
            <div class="div mt-3">
                <input name="remember" type="checkbox" id="remember">
                <label for="rememberLabel" class="form-label">Remember Me</label>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <b>{{ $errors->first() }}</b>
                </div>
            @endif
            <button type="submit" class="btn btn-warning my-3">Login</button>
            </form>
        </div>
    </div>
@endsection