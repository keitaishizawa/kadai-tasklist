@extends('layouts.layout')

@section('content')

    <h1>{{ config('const.h1')['index'] }}</h1>

    <table border="1" align="center">
        <thead>
            <tr>
                <th>{{ config('const.th')['id'] }}</th>
                <th>{{ config('const.th')['status'] }}</th>
                <th>{{ config('const.th')['task'] }}</th>
                <th>{{ config('const.th')['created_at'] }}</th>
                <th>{{ config('const.th')['updated_at'] }}</th>
            </tr>
        </thead>
        <tbody>
@if (count($tasks) > 0)
    @foreach ($tasks as $task)
            <tr>
                <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->content }}</td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->updated_at }}</td>
            </tr>
    @endforeach
@endif
        </tbody>
    </table>
    {!! link_to_route('tasks.create', config('const.index_go_createpage')) !!}
@endsection