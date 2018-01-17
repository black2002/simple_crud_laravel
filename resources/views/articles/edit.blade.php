@extends('layouts.app')
@section('content')
    <h1>Edit {{ $article->head }}</h1>


    {{ Form::model($article, array('action' => array('ArticlesController@update', $article->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('head', 'Article name') }}
        {{ Form::text('head', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Article text') }}
        {{ Form::textarea('body', null, array('class' => 'form-control','col'=>30, 'row'=>30)) }}
    </div>
    <div class="form-group">
        {{ Form::hidden('user_id', $article->user_id) }}
    </div>


    {{ Form::submit('Edit this Article!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@stop