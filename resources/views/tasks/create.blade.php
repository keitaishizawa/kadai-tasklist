@extends('layouts.layout')

@section('content')

    <h1>{{ config('const.h1')['create'] }}</h1>
    
    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('content', config('const.create_label')) !!}
        {!! Form::text('content') !!}
        {!! Form::submit(config('const.create_submit')) !!}

    {!! Form::close() !!}
@endsection