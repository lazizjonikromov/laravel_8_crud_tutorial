@extends('layouts.master')

@section('content')

<h3 style="text-align:center; margin-top:10px;">Add Category</h3>

<div class="container mt-4">
    <form method="post" action="{{url('/add-category')}}">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="">Category</label>
            <input type="text" name="name" class="form-control mt-2" placeholder="Category Name">
        </div>


        <button class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection