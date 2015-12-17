@extends('admin._layouts.default')

@section('main')

    {{ Notification::showAll() }}

    <script type="text/javascript">// <![CDATA[
            // var socket = io.connect('http://127.0.0.1:3000/');
            var socket = io.connect('http://192.168.56.121:3000/');
 
            socket.on('connect', function(data){
               socket.emit('subscribe', {channel:'score.update'});
            });
            console.log("here");
            socket.on('score.update', function (data) {
                //Do something with data
                console.log('Score updated: ', data);
            });
 
// ]]></script>
    <a href="{{ URL::route('admin.pages.create') }}" class="btn btn-primary">新建</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>最后修改时间</th>
                <th><i class="icon-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td><a href="{{ URL::route('admin.pages.show', $page->id) }}">{{ $page->title }}</a></td>
                    <td>{{ $page->updated_at }}</td>
                    <td>
                        <a href="{{ URL::route('admin.pages.edit', $page->id) }}" class="btn btn-success btn-mini pull-left">编辑</a>

                        {{ Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                              <button type="submit" href="{{ URL::route('admin.pages.destroy', $page->id) }}" class="btn btn-danger btn-mini">删除</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop