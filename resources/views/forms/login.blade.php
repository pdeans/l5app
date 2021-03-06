@extends('base')


@section('content')
    <div class="row">
        <h1 class="text-center">Please login below:</h1>
        @if ($errors->any())
            <div class="col-sm-offset-3 col-sm-7">
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open([ 'url' => '/login', 'class' => 'form-horizontal' ]) !!}
            <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('email', Input::old('email'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
            {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-offset-3 col-sm-7">
                {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop