@extends('navbar')

@section('title page', 'Change Password Page')

@section('content page')
<div class="container p-5 my-3 mx-auto w-75 bg-light border border-dark rounded-1">
    <div class="row pb-3">
        <h5>Change Password</h5>
        @if (\Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
            <b>{{ \Session::get('message') }}</b>
        </div>
        @endif
    </div>
    <div class="row">
        <form action="{{ route('password.update') }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <input class="form-control mt-3" value="{{ old('old_password') }}" type="password" name="old_password" id="oldPasswordInsert" placeholder="Old Password">
        <input class="form-control mt-3" value="{{ old('new_password') }}" type="password" name="new_password" id="newPasswordInsert" placeholder="New Password">
        <input class="form-control mt-3" value="{{ old('confirm_new_password') }}" type="password" name="confirm_new_password" id="confirmNewPasswordInsert" placeholder="Confirm New Password">
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