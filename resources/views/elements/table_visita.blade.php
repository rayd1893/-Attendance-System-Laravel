<table id="visitas" class="table table-sm table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Local</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visitas as $visita)
        <tr>
            <td>{{ $visita->persona->primerNombre }}</td>
            <td>{{ $visita->persona->apellidoPaterno.' '.$visita->persona->apellidoMaterno }}</td>
            <td>{{ substr($visita->fechaVisita,0, 10) }}</td>
            <td>{{ substr($visita->fechaVisita,-8) }}</td>
            <td>{{ $visita->persona->kumite->grupo->han->zona->local->descLocal }}</td>
            <td><button data-id="{{ $visita->idVisita }}" class="btn btn-sm btn-danger btnDeleteVisita">Eliminar</button></td>
        </tr>
        @endforeach
    </tbody>
</table>