{{-- Success Alert --}}
@if(Session::has('success'))
<script>
    $(function(){
    toastr.success("{{Session::get('success')}}")
    });
</script>
@endif

@if (Session::has('fail'))
<script>
    $(function(){
        toastr.error("{{Session::get('fail')}}")
        });
</script>
@endif

@if (Session::has('info'))
<script>
    $(function(){
        toastr.info("{{Session::get('info')}}")
        });
</script>
@endif

@if (Session::has('message'))
<script>
    $(function(){
        toastr.info("{{Session::get('message')}}")
        });
</script>
@endif

<script>
    $(function(){
    @if (!empty($errors))
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif
        @endif
});
</script>