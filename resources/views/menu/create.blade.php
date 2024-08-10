@extends('navbar')

@section('title page','Add Menu Page')

@section('content page')
    <div class="container p-4 my-3 mx-auto w-75 bg-light border border-dark rounded-1">
        <div class="row mb-3">
            <h3>Add New Menu</h3>
        </div>
        <div class="row">
            <form enctype="multipart/form-data" action="{{ route('menu.store') }}" method="POST">
                @csrf
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="priceInsert" class="form-label"><b>Menu Price</b></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="priceInsert" placeholder="Input Price" value="{{ old('price') }}" name="price">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="categoryInsert" class="form-label"><b>Catgeory</b></label>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-select" id="categoryInsert" name="category">
                            @if(old('category', null) == null)
                                <option value="" disabled selected>--Choose Category--</option>
                            @endif    
                            @foreach ($categories as $category)
                                @if (old('category') == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>                        
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>        
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="nameInsert" class="form-label"><b>Menu Name</b></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nameInsert" placeholder="Input Name" value="{{ old('name') }}" name="name">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="descriptionInsert" class="form-label"><b>Description</b></label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="5" id="descriptionInsert" placeholder="Input Description" name="description">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-3">
                        <label for="imageInsert" class="form-label"><b>Image File Upload</b></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="imageInsert" name="image">
                    </div>
                </div>
                <div class="row px-3">
                    <button type="submit" class="btn btn-warning my-3">Add Menu</button>
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