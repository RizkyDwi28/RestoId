@extends('navbar')

@section('title page', 'Edit Profile Page')

@section('content page')
<div class="container p-5 mt-5 mx-auto w-75 bg-light border border-dark rounded-1">
    <div class="row pb-3">
        <h5>Edit Profile</h5>
        @if (\Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
            <b>{{ \Session::get('message') }}</b>
        </div>
        @endif
    </div>
    <div class="row">
        <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <input class="form-control mt-3" value="{{ old('username', $user->username) }}" type="text" name="username" id="usernameInsert" placeholder="New Username">
        <input class="form-control mt-3" value="{{ old('email',$user->email ) }}" type="email" name="email" id="emailInsert" placeholder="New Email">
        <button type="submit" class="btn btn-warning my-3">Save</button>
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