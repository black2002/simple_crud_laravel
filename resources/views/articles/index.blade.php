@extends('layouts.app')
@section('content')
    
    @forelse($articles as $article)
        <div class="col-md-5">
            <div>Header: {{$article->head}}</div>
            {{--<div>Author: {{$article->user()->name}}</div>--}}
            <div>Text: {{$article->text}}</div>
            <div>Created at: {{$article->created_at}}</div>
            {{ Form::open(array('url' => 'articles/' . $article->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this Article', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
            <a class="btn btn-small btn-success" href="{{ URL::to('articles/' . $article->id) }}">Show this Article</a>

            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
            <a class="btn btn-small btn-info" href="{{ URL::to('articles/' . $article->id . '/edit') }}">Edit this Article</a>

        </div>
    @empty
        <a type="btn btn-success" href="{{URL::to('articles/create')}}"></a>
    @endforelse
    
@stop