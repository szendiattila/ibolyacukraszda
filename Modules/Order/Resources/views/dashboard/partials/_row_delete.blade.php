{!! Form::open(['method' => 'DELETE','route' => [$modul.'.destroy', $row_id]]) !!}
<div class="btn-group" rule="group">

    <button name='deleteBtn'
            value='1'
            class='btn btn-danger'
            data-toggle='tooltip'
            title='Törlés'>
        <i class="fa fa-trash" aria-hidden="true"></i>
        Törlés
    </button>
</div>
{!! Form::close() !!}