@extends('navbar')

@section('title page','Transaction History Page')

@section('content page')
    <div class="container">
        <div class="row p-1 mt-3">
            <h5>My Transaction History</h5>
        </div>
        @if($carts->isEmpty())
            <div class="row mt-5">
                <h5 class="text-center">Transaction history is empty! Let's go Shopping :)</h5> 
            </div>    
        @else    
        <div class="row p-1 my-3 mx-auto">
            <div class="accordion" id="accordionHistory">
                @foreach ($carts as $cart)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}">
                            {{ $cart->check_out_date }}
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse" data-bs-parent="#accordionHistory">
                            <div class="accordion-body">
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
                                            </tr>    
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-end">
                                    <b>Grand Total : Rp {{ number_format($cart->grand_total_price, 0,',','.') }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif               
    </div>
@endsection