@extends('layouts.app')
@section('content')

    <div class="col-md-5">
        <div>Header: {{$article->head}}</div>
{{--        <div>Author: {{$article->user()->name}}</div>--}}
        <div>Text: {{$article->text}}</div>
        <div>Created at: {{$article->created_at}}</div>

    </div>
@stop