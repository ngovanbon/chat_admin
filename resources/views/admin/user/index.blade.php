@extends('admin.layout.master')
@section('title', 'Message list')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="float-left">{{__('User List')}}</h1>
                <a href="{{ route('user.create', ['user_id' => '']) }}" class="btn btn-success btn-sm float-right">{{__('Create user')}}</a>
            </div>
            <table class="table-bordered table">
                <thead>
                <tr>
                    <td>Name</td>
                    <td width="150">Email</td>
                    <td width="150">Is VIP</td>
                    <td>Update</td>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->is_vip ? 'Yes' : 'No'}}</td>
                        <td>{{$user->update_at}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('user.edit', ['user_id' => $user->id])}}">Edit</a>
                        </td>
                        <td>
                            {!! Form::open(['route' => array('user.delete', $user->id)]) !!}
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" id="btnDelete" onclick="return confirm('{{ 'Do you want delete ' . $user->name . ' ?'}}');" class="btn btn-danger" value="Delete">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
