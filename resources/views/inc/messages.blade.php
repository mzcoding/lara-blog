@if(session()->has('success'))
    <script type="text/javascript">
        $(function(){
            alertify.alert(" {!! session()->get('success')  !!} ");
            alertify.success("{!! session()->get('success')  !!}");
        });
    </script>
@elseif(session()->has('error'))
    <script type="text/javascript">
        $(function(){
            alertify.alert(" {!! session()->get('error')  !!} ");
            alertify.error("{!! session()->get('error')  !!}");
        });
    </script>
@endif