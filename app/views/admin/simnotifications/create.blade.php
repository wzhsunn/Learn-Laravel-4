@extends('admin._layouts.default')
 
@section('main')
 
    <h2>发布消息</h2>

    {{ Notification::showAll() }}
     
    @if ($errors->any())
            <div class="alert alert-error">
                    {{ implode('<br>', $errors->all()) }}
            </div>
    @endif

    {{ Form::open(array('route' => 'admin.simnotifications.store')) }}

        <div class="control-group">
            {{ Form::label('from_user', '发起人') }}
            <div class="controls">
                {{ Form::text('from_user', '1', ['readonly']) }}
            </div>
        </div>
        <div class="control-group">
            {{ Form::label('to_user', '接收人') }}
            <div class="controls">
                {{ Form::text('to_user') }}
            </div>
        </div>
        <div class="control-group">
            {{ Form::label('subject', '标题') }}
            <div class="controls">
                {{ Form::text('subject') }}
            </div>
        </div>
<!-- {{Form::selectMonth('month');}} -->
        <div class="control-group">
            {{ Form::label('body', '内容') }}
            <div class="controls">
                {{ Form::textarea('body') }}
            </div>
        </div>
        <div class="control-group">
            {{ Form::label('need_receipt', '是否需要回执?') }}
            <div class="controls">
                {{ Form::checkbox('need_receipt') }}
            </div>
        </div>
        <div class="form-actions">
            {{ Form::submit('新增', array('class' => 'btn btn-success btn-save ')) }}
            <a href="{{ URL::route('admin.pages.index') }}" class="btn ">取消</a>
        </div>

    {{ Form::close() }}

@stop