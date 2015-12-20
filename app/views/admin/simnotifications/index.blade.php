@extends('admin._layouts.default')

@section('main')

    {{ Notification::showAll() }}

   
    <a href="{{ URL::route('admin.simnotifications.create') }}" class="btn btn-primary">新建</a>

    <table class="table table-striped table-bordered ">
        <thead>
            <tr>
                <th>#</th>
                <th>发起人</th>
                <th>接收人</th>
                <th>标题</th>
                <th>内容</th>
                <th>是否需要回执？</th>
                <!-- <th>创建的时间</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($simnotifications as $simnotification)
            <tr>
             <td>{{ $simnotification->id }}</td>
             <td>{{ $simnotification->from_user }}</td>
             <td>{{ $simnotification->to_user }}</td>
             <td>{{ $simnotification->subject }}</td>
             <td>{{ $simnotification->body }}</td>
             <td>{{ $simnotification->need_receipt }}</td>
             <!-- <td>{{ $simnotification->create_at }}</td> -->
             </tr>
            @endforeach
           
        </tbody>
    </table>

@stop