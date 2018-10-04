@extends('admin.layout.master')
@section('title', 'User edit')
@section('main-content')
    <div class="container">
        <div class="row">
            <h1 class="float-left">{{ __('Edit User') }}</h1>
        </div>
        <div class="col-md-12">
            <form method="POST" action="{{ route('user.store') }}" aria-label="{{ __('Edit User') }}"
                  enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{$user->id}}">

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{ $user->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                           class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ $user->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="avatar" class="col-md-2 col-form-label text-md-right">{{ __('Avatar') }}</label>

                    <div class="col-md-6">
                        @if($user->avatar)
                            <div id="image-preview" class="">
                                <img src="{{$user->avatar}}" width="200">
                            </div>
                        @endif
                        <input id="avatar" type="file" name="avatar" class="form-control" accept="image/*">

                        @if ($errors->has('avatar'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="number"
                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                               value="{{ $user->phone }}">

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update User') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
