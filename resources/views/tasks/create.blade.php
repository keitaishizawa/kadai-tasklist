@extends('layouts.layout')

@section('content')

    <h1>{{ config('const.h1')['create'] }}</h1>
    
    @include('commons.error_messages')
    
    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('status', config('const.create_label_status')) !!}
        {!! Form::text('status') !!}<br>
        {!! Form::label('content', config('const.create_label_content')) !!}
        {!! Form::text('content') !!}<br>
        {!! Form::submit(config('const.create_submit')) !!}

    {!! Form::close() !!}
@endsection