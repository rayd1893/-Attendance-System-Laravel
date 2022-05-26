<table id="personas" class="table table-sm table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Kumite</th>
            <th>Grupo</th>
            <th>Local</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($personas as $persona)
        <tr>
            <td>{{ $persona->primerNombre }}</td>
            <td>{{ $persona->apellidoPaterno.' '.$persona->apellidoMaterno }}</td>
            <td>{{ $persona->kumite->codigoKumite }}</td>
            <td>{{ $persona->kumite->grupo->descGrupo }}</td>
            <td>{{ $persona->kumite->grupo->han->zona->local->descLocal }}</td>
            <td><button data-id="{{ $persona->idPersona }}" class="btn btn-sm btn-success btnAsistencia"> Asistencia</button></td>
        </tr>
        @endforeach
    </tbody>
</table>