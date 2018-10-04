@extends('layout.master')
@section('title', 'Thêm mới sản phẩm')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Product From</h1>
        </div>
        <div class="row">
            <form action="/admin/product" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <lable>Name :</lable>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Price :</lable>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Category :</lable>
                    <select name="categoryId" id="">
                        <option>Chọn</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <lable>Description :</lable>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Image:</lable>
                    <input type="text" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-dark">
                </div>
            </form>
        </div>
    </div>
@endsection