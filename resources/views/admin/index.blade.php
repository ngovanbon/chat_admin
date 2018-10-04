@extends('admin.layout.master')
@section('title', 'Danh sách các sản phẩm')
@section('main-content')
    <div class="container">
        <div class="col-sm-12">
            <h1 class="float-left">List Product</h1>
            <a href="/admin/product/create" class="btn btn-success btn-sm float-right">Thêm mới</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection