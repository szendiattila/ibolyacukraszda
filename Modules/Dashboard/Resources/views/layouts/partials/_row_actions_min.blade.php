{!! Form::open(['method' => 'DELETE','route' => [$modul.'.destroy', $row_id]]) !!}
<div class="btn-group" rule="group">

    <a class="btn btn-primary"
       href="/dashboard/{{ $modul }}/{{ $row_id }}/edit"
       data-toggle="tooltip"
       title="{{ isset($modifyTooltip) ? $modifyTooltip : 'Módosítás'}}">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        Módosítás
    </a>

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
