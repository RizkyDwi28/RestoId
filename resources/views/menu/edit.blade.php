@extends('navbar')

@section('title page','Update Menu Page')

@section('content page')
    <div class="container p-4 my-3 mx-auto w-75 bg-light border border-dark rounded-1">
        <div class="row mb-3">
            <h3>Update Menu</h3>
        </div>
        <div class="row">
            <form enctype="multipart/form-data" action="{{ route('menu.update', ['menu_id' => $menu->id]) }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="priceInsert" class="form-label"><b>Menu Price</b></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="priceInsert" placeholder="Input Price" value="{{ old('price',$menu->price) }}" name="price">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="categoryInsert" class="form-label"><b>Catgeory</b></label>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-select" id="categoryInsert" name="category">
                            @if(old('category', null) == null)
                                @foreach ($categories as $category)
                                    @if ($menu->category_id == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>                        
                                    @endif
                                @endforeach
                            @else
                                @foreach ($categories as $category)
                                    @if (old('category') == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>                        
                                    @endif
                                @endforeach
                            @endif    
                        </select>
                    </div>
                </div>        
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="nameInsert" class="form-label"><b>Menu Name</b></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nameInsert" placeholder="Input Name" value="{{ old('name',$menu->name) }}" name="name">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="descriptionInsert" class="form-label"><b>Description</b></label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="5" id="descriptionInsert" placeholder="Input Description" name="description">{{ old('description',$menu->description) }}</textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-3">
                        <b>Menu Image</b>
                        <img src="{{ asset('storage/images/'.$menu->image) }}" alt="{{ $menu->image }}" height="100" width="100">
                    </div>
                    <div class="col-sm-3">
                        <label for="imageInsert" class="form-label"><b>Menu Image</b></label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="imageInsert" name="image" value="{{ $menu->image }}" disabled>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="newimageInsert" class="form-label"><b>New Image</b></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="newimageInsert" name="newimage">
                    </div>
                </div>
                <div class="row px-3">
                    <button type="submit" class="btn btn-warning my-3">Update</button>
                </div>
            </form>  
            @if($errors->any())
                <div class="row mx-auto">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <b>{{ $error }}</b>
                    </div>      
                    @endforeach
                </div>
            @endif       
        </div>
        </div>
    </div>
@endsection