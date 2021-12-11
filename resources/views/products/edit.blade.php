@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-end w-100">
        <a href="{{url('/')}}" class="btn btn-primary text-white mb-4">Go Back</a>
    </div>

    <form method="post" action="{{url('/edit-product/'.$product->id)}}">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" value="{{old('title') ?? $product->title}}" class="form-control" placeholder="Title">
        </div>

        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" value="{{old('price') ?? $product->price}}" class="form-control" placeholder="Price">
        </div>
        
        <label for="">Category</label>
        <select name="category_id" value="{{old('category_id') ?? $product->category_id}}" id="" class="form-control mt-1">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                    {{$category->name}}
                </option>
            @endforeach
        </select>

        <button class="btn btn-primary mt-3">Submit</button>
    </form>

@endsection