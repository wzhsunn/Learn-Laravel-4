<script src="{{ URL::asset('js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/script.js') }}"></script>
<script src="{{ URL::asset('js/socket.io-1.2.0.js') }}"></script>


<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">

 <script type="text/javascript">// <![CDATA[
            // var socket = io.connect('http://127.0.0.1:3000/');
            var socket = io.connect('http://192.168.56.121:3000/');
 
            // socket.on('connect', function(data){
            //    socket.emit('subscribe', {channel:'score.update'});
            // });
            console.log("here");
            socket.on('score.update', function (data) {
                //Do something with data
                console.log('Score updated: ', data);
                $("#notification").text(data);
            });
 
// ]]></script>
