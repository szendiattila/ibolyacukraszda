@section('style')
    @parent
    <link href="{{ url('/plugins/select2/select2-custom.css') }}" rel="stylesheet"/>
@stop
@section('scripts')
    @parent
    <script src="{{ url('/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2({placeholder: 'Válasszon...', allowClear: true});
        });
    </script>
@stop