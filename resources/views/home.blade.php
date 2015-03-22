@extends('base')


@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="main-wrapper well">

                @if (Auth::check())
                    <h1 class="text-center">
                        Hello, {{ Auth::user()->name }}!
                    </h1>
                        {!!HTML::link('/logout', 'Logout')!!}

                @else
                    <h1 class="text-center">
                        Hello! Please {!!HTML::link('/login', 'Login')!!}
                        or {!!HTML::link('/register', 'Register')!!}
                    </h1>
                @endif

            </div>
        </div>
    </div>

@stop
