@if(count($errors->all()) > 0)
    <div class="row errors-row">
        <div class="col-xs-12">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>
    </div>
@endif