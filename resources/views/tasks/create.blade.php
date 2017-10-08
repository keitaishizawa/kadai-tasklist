@extends('layouts.layout')

@section('content')

    <h1>{{ config('const.h1')['create'] }}</h1>
    
    @include('commons.error_messages')
    
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('status', config('const.create_label_status')) !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', config('const.create_label_content')) !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit(config('const.create_submit'), ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection