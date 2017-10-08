@extends('layouts.layout')

@section('content')

    <h1>{{ config('const.h1_parts')['id'] . $task->id . config('const.h1')['edit'] }}</h1>
    
    @include('commons.error_messages')
    
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('status', config('const.edit_label_status')) !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', config('const.edit_label_content')) !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit(config('const.edit_submit'), ['class' => 'btn btn-default']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection