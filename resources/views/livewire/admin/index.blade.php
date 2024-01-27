<div>
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive" style="max-height: none">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Promotor</th>
                                <th>Ciudad</th>
                                <th>Punto</th>
                                <th>Fecha visita</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ejecuciones as $key => $ejecucion)
                                <tr>
                                    <td>{{ $key+=1 }}</td>
                                    <td>{{ $ejecucion->promotor->name }}</td>
                                    <td>{{ $ejecucion->promotor->ciudad->description }}</td>
                                    <td>{{ $ejecucion->punto->descripcion }}</td>
                                    <td>{{ $ejecucion->fechaVisita }}</td>
                                    <td>
                                        <a href="{{ route('visita', $ejecucion->id) }}" class="btn btn-primary">
                                            Mas detalles
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
