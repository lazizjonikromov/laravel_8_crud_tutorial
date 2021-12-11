@extends('layouts.master')

@section('content')


<div class="container mt-1">
    <h3>Category</h3>
    <div class="d-flex justify-content-end w-100">
        <a href="{{url('/add-category')}}" class="btn btn-primary text-white mb-4">Add Category</a>
    </div>    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                </tr> 
            @endforeach
        </tbody>
    </table> 
</div>
@endsection

