@extends('navbar')

@section('title page', 'View Menu Page')

@section('content page')
    <div class="container">
        <div class="row p-1 mt-3">
            <h3>Manage Menu</h3>
        </div>
        <div class="row p-1 mb-3">
            @if (\Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
                <b>{{ \Session::get('message') }}</b>
            </div>
            @endif    
            <div class="table-responsive">
                <table class="table table-bordered border border-dark">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Menu Image</th>
                            <th>Menu Name</th>
                            <th>Menu Description</th>
                            <th>Menu Price</th>
                            <th>Menu Category</th>
                            <th>Sold</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                        <tr>
                        <td>{{ $menu->id }}</td>
                        <td><img src="{{ asset('storage/images/'.$menu->image) }}" alt="{{ $menu->image }}" height="100" width="100"></td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->description }}</td>
                        <td>Rp {{ number_format($menu->price,0,',','.') }}</td>
                        <td>{{ $menu->category->name }}</td>
                        <td>{{ $menu->sold }}</td>
                        <td>                    
                            <a href="{{ route('menu.edit', ['menu_id'=>$menu->id]) }}" type="button" class="btn btn-warning mt-1">
                                <span class="fa fa-pencil"></span>
                            </a> 
                            <form action="{{  route('menu.destroy', ['menu_id'=>$menu->id]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            @csrf
                                <button type="submit" class="btn btn-danger mt-1">
                                    <span class="fa fa-trash-o"></span>
                                </button>
                            </form>
                        </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $menus->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection