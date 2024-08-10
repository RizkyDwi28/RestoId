@extends('navbar')

@section('title page', 'Home Page')

@section('content page')
    @if (\Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show mx-3 my-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
        <b>{{ \Session::get('message') }}</b>
    </div>
    @elseif (\Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show mx-3 my-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
        <b>{{ \Session::get('warning') }}</b>
    </div>
    @endif
    <div class="p-5 mx-3 my-3 bg-image text-center text-warning rounded-2"  style="background-image: url(img/banner.jpg)">
        <h1 class="p-5"><strong><b class="p-2 border border-5 border-dark rounded-4 bg-light">RESTO ID</b></strong></h1>
    </div>
    <div class="p-2 mx-3 my-3 bg-light text-center rounded-2 border border-dark border-1">
        <h3 class="p-2 text-danger">About Us</h3>
        <h6>We are an online restaurant that sell foods and drinks</h6>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center mt-3">
                <h3>Our Best Seller Menu</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($menus as $menu)
                <div class="col-6 col-lg-3">
                    <div class="card p-1 my-3 border border-dark">
                        <div class="card-header">
                            <div class="d-flex justify-content-center">
                                <img class="rounded-3" src="{{ asset('storage/images/'.$menu->image) }}" alt="{{ $menu->image }}" height="200" width="200">
                            </div>
                        </div>
                        <div class="card-body">
                            <h6>{{ $menu->name }}</h6>
                            <h6><span class="badge bg-secondary">{{ $menu->category->name }}</span></h6>
                            <p>Rp {{ number_format($menu->price,0,',','.') }}</p>
                            <div class="d-flex justify-content-end">
                                <small><p class="bg-info p-2 rounded-3">{{ $menu->sold }} sold</p></small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('menu.show', ['menu_id'=>$menu->id]) }}" type="button" class="btn btn-dark">Detail menu</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
