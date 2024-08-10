@extends('navbar')

@section('title page', 'Register Page')

@section('content page')
    <div class="container p-5 my-4 mx-auto w-75 bg-light border border-dark rounded-1">
        <div class="row pb-3">
            <h5>Register Form</h5>
        </div>
        <div class="row">
            <form action="{{ route('register.action') }}" method="POST">
            @csrf
            <input class="form-control mt-3" value="{{ old('username') }}" type="text" name="username" id="usernameInsert" placeholder="Full Name">
            <input class="form-control mt-3" value="{{ old('email') }}" type="email" name="email" id="emailInsert" placeholder="Email">
            <input class="form-control mt-3" value="{{ old('password') }}" type="password" name="password" id="passwordInsert" placeholder="Password">
            <input class="form-control mt-3" value="{{ old('confirm_password') }}" type="password" name="confirm_password" id="confirm_passwordInsert" placeholder="Confirm Password">
            <button type="submit" class="btn btn-warning my-3">Register</button>
            </form>
        </div>
        @if ($errors->any())
            <div class="row">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <b>{{ $error }}</b>
                </div>
                @endforeach
            </div>   
        @endif    
    </div>
@endsection