@extends('layouts.layout')

@section('content')

    <h1>{{ config('const.h1_parts')['id'] . $task->id . config('const.h1')['edit'] }}</h1>
    
    @include('commons.error_messages')
    
    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        {!! Form::label('status', config('const.edit_label_status')) !!}
        {!! Form::text('status') !!}<br>
        {!! Form::label('content', config('const.edit_label_content')) !!}
        {!! Form::text('content') !!}<br>
        {!! Form::submit(config('const.edit_submit')) !!}

    {!! Form::close() !!}
@endsection