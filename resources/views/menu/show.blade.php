@extends('navbar')

@section('title page', 'View Menu Detail Page')

@section('content page')
    <div class="container border border-dark rounded-2 p-3 w-75 my-3">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex justify-content-center">
                    <img class="rounded-3" src="{{ asset('storage/images/'.$menu->image) }}" alt="{{ $menu->image }}" height="300" width="300">
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-4 mt-2">
                    <h5><b>{{ $menu->name }}</b></h5>
                    <div class="d-flex justify-content-end">
                        <small><p class="bg-info p-2 rounded-3">{{ $menu->sold }} sold</p></small>
                    </div>
                </div>
                <div>
                    <p><b>Category:</b></p>
                    <p class="border-bottom border-dark">{{ $menu->category->name }}</p>
                </div>
                <div>
                    <p><b>Price:</b></p>
                    <p class="border-bottom border-dark">Rp {{ number_format($menu->price,0,',','.') }}</p>
                </div>
                <div>
                    <p><b>Description:</b></p>
                    <p class="border-bottom border-dark">{{ $menu->description }}</p>
                </div>
                @guest
                    <a href="{{ route('login.page') }}" type="button" class="btn btn-warning">Login To Buy</a>                        
                @endguest
                @auth
                    @if(Auth::user()->role_id == 2) 
                    <form action="{{ route('add.to.cart', ['menu_id' => $menu->id]) }}" method="POST">
                    @csrf
                    <label for="quantityInsert" class="form-label"><b>Quantity: </b></label>
                    <input type="number" class="form-control" id="quantityInsert" value="1" min="1" name="quantity">
                    <button type="submit" class="btn btn-warning mt-2">Add To Cart</button>
                    </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection