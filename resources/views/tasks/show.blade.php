@extends('layouts.layout')

@section('content')

    <h1>{{ config('const.h1_parts')['id'] . $task->id . config('const.h1')['show'] }}</h1>
    
    <table border="1" align="center">
        <thead>
            <tr>
                <th>{{ config('const.th')['id'] }}</th>
                <th>{{ config('const.th')['task'] }}</th>
                <th>{{ config('const.th')['created_at'] }}</th>
                <th>{{ config('const.th')['updated_at'] }}</th>
            </tr>
        </thead>
        <tbody>
@if ($task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->content }}</td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->updated_at }}</td>
            </tr>
@endif
        </tbody>
    </table>
    {!! link_to_route('tasks.edit', config('const.show_go_editpage'), ['id' => $task->id]) !!}
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit(config('const.delete_submit')) !!}
    {!! Form::close() !!}
@endsection