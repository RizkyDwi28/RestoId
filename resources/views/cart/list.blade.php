@extends('navbar')

@section('title page', 'Cart List Page')

@section('content page')
    <div class="container">
        <div class="row p-1 mt-3">
            <h5>My Cart</h5>
            @if (\Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
                <b>{{ \Session::get('message') }}</b>
            </div>
            @endif   
        </div>
        @if($cart->cart_items->isEmpty())
            <div class="row my-5">
                <h5 class="text-center">Cart is empty! Let's go Shopping :)</h5> 
            </div>    
        @else    
            <div class="row p-1 mb-3 mx-auto">
                <div class="table-responsive">
                    <table class="table table-bordered border border-dark">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Menu Image</th>
                                <th>Menu Name</th>
                                <th>Menu Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->cart_items as $cart_item)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/images/'.$cart_item->menu->image) }}" alt="{{ $cart_item->menu->image }}" height="100" width="100"></td>
                            <td>{{ $cart_item->menu->name }}</td>
                            <td>Rp {{ number_format($cart_item->menu->price,0,',','.') }}</td>
                            <td>{{ $cart_item->quantity }}</td>
                            <td>Rp {{ number_format($cart_item->total_price,0,',','.') }}</td>
                            <td>    
                                <div>
                                <form action="{{ route('cart_item.decrease', ['menu_id'=>$cart_item->menu->id]) }}" method="POST" class="d-inline">
                                {{ method_field('PUT') }}
                                @csrf
                                    <button type="submit" class="btn btn-warning mt-1">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </form>
                                <form action="{{ route('cart_item.increase', ['menu_id'=>$cart_item->menu->id]) }}" method="POST" class="d-inline">
                                {{ method_field('PUT') }}
                                @csrf
                                    <button type="submit" class="btn btn-warning mt-1">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </form> 
                                <form action="{{ route('remove.from.cart', ['menu_id'=>$cart_item->menu->id]) }}" method="POST" class="d-inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                    <button type="submit" class="btn btn-danger mt-1">                      
                                        <span class="fa fa-trash-o"></span>                    
                                    </button>
                                </form>               
                                </div> 
                            </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <b>Grand Total : Rp {{ number_format($cart->grand_total_price, 0,',','.') }}</b>
                <div class="row border border-2 border-warning rounded-3 p-2 mx-auto my-2">
                    <div class="col-9 my-auto mx-auto">
                        <b>Any More Order ?</b>
                        <p>You still can add other menu.</p>
                    </div>
                    <div class="col-3 my-auto mx-auto">
                        <a href="{{ route('menu.index') }}" type="button" class="btn btn-warning">Add Other Menu</a>
                    </div>
                </div>
            </div>
            <div class="row p-2 my-3 mx-auto bg-light border border-dark rounded-1">
                <h5>Receiver</h5>
                <form action="{{ route('check.out', ['cart_id'=>$cart->id]) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                    <label for="nameInsert" class="form-label mt-1"><b>Receiver Name</b></label>
                    <input type="text" class="form-control" id="nameInsert" placeholder="Input Receiver Name" value="{{ old('name', session()->get('currUserSession')->username) }}" name="name">
                    <label for="addressInsert" class="form-label mt-1"><b>Receiver Address</b></label>
                    <textarea class="form-control" rows="3" id="addressInsert" placeholder="Input Receiver Address" name="address">{{ old('address') }}</textarea>
                    <button type="submit" class="btn btn-warning my-3">Check Out ({{ $cart->cart_items->count() }})</button>
                </form>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <b>{{ $error }}</b>
                    </div>      
                    @endforeach
                @endif 
            </div>
        @endif
    </div>
@endsection