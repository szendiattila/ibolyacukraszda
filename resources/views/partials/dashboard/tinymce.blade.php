@section('script')
    @parent
    <script type="text/javascript" src="{{ url('/plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/plugins/tinymce/tinymce_editor.js') }}"></script>
    <script type="text/javascript">
        editor_config.selector = ".tinymce-control";
        tinymce.init(editor_config);
    </script>
@stop