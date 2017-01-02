{!! Form::open(['method' => 'DELETE','route' => [$modul.'.destroy', $row_id], 'id' => 'formId_'.$row_id]) !!}
<div class="btn-group" rule="group">

    <button name='deleteBtn'
            value='{{$row_id}}'
            class='btn btn-danger orderDelete'
            data-toggle='tooltip'
            title='Törlés'>
        <i class="fa fa-trash" aria-hidden="true"></i>
        Törlés
    </button>
</div>
{!! Form::close() !!}