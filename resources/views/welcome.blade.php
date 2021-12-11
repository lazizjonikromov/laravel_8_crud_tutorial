@extends('layouts.master')

@section('content')
    <h3>Products</h3>
    <div class="d-flex justify-content-end w-100">
        <a href="{{url('/add-product')}}" class="btn btn-primary text-white mb-4">Add Product</a>
    </div>    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td style="display:flex;">
                        <div>
                            <a href="{{url('/edit-product/'.$product->id)}}" class="btn btn-primary">Edit</a>
                        </div>
                        <form action="{{url('/delete-product/'.$product->id)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger" style="margin-left: 10px;" type="submit">Delete</button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table> 
@endsection

<!-- @foreach($products as $product)
    <p>{{$product->id}}</p>
    <p>{{$product->title}}</p>
    <p>{{$product->price}}</p>
@endforeach -->
