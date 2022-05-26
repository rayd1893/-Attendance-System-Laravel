<table id="resumen" class="table table-sm table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Local</th>
            <th>Cant. Personas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resumen as $r)
        <tr>
            <td>{{ $r->descLocal }}</td>
            <td>{{ $r->total_visitas}}</td>
        </tr>
        @endforeach
    </tbody>
</table>