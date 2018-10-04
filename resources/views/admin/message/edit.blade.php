@extends('layout.master')
@section('title','Cập nhật thông tin sản phẩm')
@section('content');
<div class="container">
    <div class="row">
        <h1>Product From</h1>
        <ul>
            <li><a href="/admin/product/create">Tạo mới</a></li>
            <li><a href="/admin/product">Danh sách</a></li>
        </ul>
    </div>
    <div class="row">
        <form action="/admin/product/{{$product_in_view -> id}}" method="post">
            @method('PUT')
            {{csrf_field()}}
            <div class="form-group">
                <lable>Name  : </lable>
                <input type="text" name="name" class="form-control" value="{{$product_in_view -> name}}">
            </div>
            <div class="form-group">
                <lable>Price : </lable>
                <input type="text" name="price" class="form-control" value="{{$product_in_view -> price}}">
            </div>

            <div class="form-group">
                <lable >Category : </lable>
                <select name="categoryId" id="">
                    @foreach($categories as $category)
                        @if($category->id == $product_in_view->categoryId)
                            <option value="{{$category->id}}" selected >{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}"  >{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <lable>Description : </lable>
                <input type="text" name="description" class="form-control" value="{{$product_in_view -> description}}">
            </div>
            <div class="form-group">
                <lable>Image: </lable>
                <input type="text" name="image" class="form-control" value="{{$product_in_view -> image}}">
                <img src="{{$product_in_view -> image}}" alt="" width="150px">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
                <input type="reset" value="Reset" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>
@endsection