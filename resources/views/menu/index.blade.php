@extends('navbar')

@section('title page', 'Show Menu Page')

@section('content page')
    <div class="container">
        @if (\Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
            <b>{{ \Session::get('message') }}</b>
        </div>
        @endif                
        <div class="row">
            <div class="d-flex justify-content-center mt-3">
                <h3>Our Menus</h3>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end">
                <div class="dropdown">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
                        Order By
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('menu.sort', ['sort_type'=>0]) }}">Oldest</a></li>
                        <li><a class="dropdown-item" href="{{ route('menu.sort', ['sort_type'=>1]) }}">Newest</a></li>
                        <li><a class="dropdown-item" href="{{ route('menu.sort', ['sort_type'=>2]) }}">Category</a></li>
                        <li><a class="dropdown-item" href="{{ route('menu.sort', ['sort_type'=>3]) }}">Most Sold</a></li>
                        <li><a class="dropdown-item" href="{{ route('menu.sort', ['sort_type'=>4]) }}">Least Sold</a></li>
                        <li><a class="dropdown-item" href="{{ route('menu.sort', ['sort_type'=>5]) }}">Cheapest Price</a></li>
                        <li><a class="dropdown-item" href="{{ route('menu.sort', ['sort_type'=>1]) }}">Most Expensive Price</a></li>
                    </ul>
                </div>
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
        <div class="d-flex justify-content-center mt-3">
            {{ $menus->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection