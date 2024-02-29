<div>
    <div class="container">
        <div class="row my-2">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="" class="bold">Ciudad:</label>
                            <select class="form-control" wire:model.change='ciudad' @if (!$superAdmin) disabled @endif>
                                <option value="">Seleccionar</option>
                                @foreach ($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}">{{ $ciudad->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card my-2 mb-1">
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
                {{ $ejecuciones->links() }}
            </div>
        </div>
    </div>
</div>

