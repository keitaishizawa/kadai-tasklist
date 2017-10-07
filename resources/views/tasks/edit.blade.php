@extends('layouts.layout')

@section('content')

    <h1>{{ config('const.h1_parts')['id'] . $task->id . config('const.h1')['edit'] }}</h1>
    
    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        {!! Form::label('content', config('const.edit_label')) !!}
        {!! Form::text('content') !!}
        {!! Form::submit(config('const.edit_submit')) !!}

    {!! Form::close() !!}
@endsection