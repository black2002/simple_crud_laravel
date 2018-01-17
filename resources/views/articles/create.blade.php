@extends('layouts.app')
@section('content')

    {{Html::ul($errors->all())}}
    {{ Form::open(array('url' => 'articles')) }}

    <div class="form-group">
        {{ Form::label('head', 'Article head') }}
        {{ Form::text('head', old('head'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Article text') }}
        {{ Form::textarea('body', old('head'), array('class' => 'form-control','row'=>20,'col'=>40)) }}
    </div>

    <div class="form-group">
        {{ Form::hidden('user_id', Auth::id()) }}
    </div>





    {{ Form::submit('Create an Article!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@stop