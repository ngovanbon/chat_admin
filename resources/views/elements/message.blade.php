
{{--*/ $errorsFlash = Session::get('error') /*--}}
<div id="message" <?php echo Session::has('error') ? "" : "style='display:none;'" ?>>
    <div class="body" id="error-message-container">
        @if ( Session::has('error') )
            @if (is_array($errorsFlash))
                @foreach ($errorsFlash as $error)
                    <p><a class="ag-error-msg">{{ $error }}</a></p>
                @endforeach
            @else
                <p><a id="{{Session::has('name') ? Session::get("name").'-error' : '' }}" class="ag-error-msg">{{ $errorsFlash }}</a></p>
            @endif

            {{--*/ $validationErrors = $errors->toArray() /*--}}
            @if (is_array($validationErrors))
                @foreach ($validationErrors as $name=>$error)
                    @if (is_array($error))
                        @foreach ($error as $msg)
                            <p>
                                <a class="ag-error-msg" id="{{$name."-error"}}">{{ $msg }}</a>
                            </p>
                        @endforeach
                    @endif
                @endforeach
            @endif
        <!-- / .body -->
        @endif
    </div>
    <!-- / #message -->
</div>


@if ( Session::has('success') )
    {{--*/ $message = Session::get('success') /*--}}
    <div id="message" class="success-message">
        <div class="body">
            <p>{{ $message }}</p>
            <!-- / .body -->
        </div>
        <!-- / #message -->
    </div>
@endif
