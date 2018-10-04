@extends('admin.layout.master')
@section('title', 'Message list')
@section('main-content')
    <div class="container">
        <div class="col-sm-12">
            <h1 class="float-left">Message List</h1>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <table class="table-bordered table">
                <thead>
                <tr>
                    <td>Name</td>
                    <td width="150">Message</td>
                    <td>Create</td>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{$message->rootUserId}}</td>
                        <td>{{$message->msg}}</td>
                        <td>{{date('Y-m-d', intval($message->time/1000))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection