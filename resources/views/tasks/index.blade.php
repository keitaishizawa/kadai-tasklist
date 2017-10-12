@extends('layouts.layout')

@section('content')

    <!-- ログイン時 -->
    @if (Auth::check())
        <h1>{{ $user->name . config('const.h1')['index'] }}</h1>

            @if (count($tasks) > 0)
                <table class="table table-striped table-hover table-condensed">
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
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->content }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>{{ $task->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $tasks->render() !!}
            @else
                <p>{{ 'タスクは未登録です' }}</p>
            @endif
        {!! link_to_route('tasks.create', config('const.index_go_createpage'), null , ['class' => 'btn btn-primary']) !!}    
    @else
    <!-- 非ログイン時 -->
        <h1>{{ 'タスクリスト一覧へようこそ' }}</h1>
        <p>{{ '会員登録してタスクを管理しませんか？' }}</p>
        {!! link_to_route('signup.get', '会員登録', null, ['class' => 'btn btn-lg btn-primary']) !!}
    @endif

@endsection