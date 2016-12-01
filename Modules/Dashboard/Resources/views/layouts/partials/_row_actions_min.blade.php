{!! Form::open(['method' => 'DELETE','route' => [$modul.'.destroy', $row_id]]) !!}
<div class="btn-group" rule="group">
    <a class="btn btn-primary" href="/dashboard/{{ $modul }}/{{ $row_id }}/edit" data-toggle="tooltip"
       title="{{ isset($modifyTooltip) ? $modifyTooltip : 'Módosítás'}}">Módosítás<i class="fa fa-edit"></i></a>
    <button name='deleteBtn' value='1' class='btn btn-danger' data-toggle='tooltip' title='Törlés'
            onclick='return confirm(this,"destroy")'><i class="fa fa-trash">Törlés</i></button>
</div>
{!! Form::close() !!}
