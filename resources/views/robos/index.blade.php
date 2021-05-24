<div class="container">
    <a href="{{route('robos.create')}}"> Nuevo Registro</a>

    <table class="table table-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>FECHA Y HORA</th>
                <th>ENTIDAD</th>
                <th>MUNICIPIO</th>
                <th>LOCALIDAD</th>
                <th>CALLE</th>
                <th>NUMERO EXTERIOR</th>
                <th>CP</th>
                <th>TIPO DE LUGAR</th>
                <th>DESCRIPCION</th>
                <th>DELITO</th>
                <th>ARMA ASOCIADA</th>
                <th>ESTATUS</th>
            </tr>

            <tbody>
                @foreach ($robos as $robo)
                    <tr>
                        <td>{{$robo->id}}</td>
                        <td>{{$robo->dateTime}}</td>
                        <td>{{$robo->entidad}}</td>
                        <td>{{$robo->municipio}}</td>
                        <td>{{$robo->localidad}}</td>
                        <td>{{$robo->calle}}</td>
                        <td>{{$robo->numExterior}}</td>
                        <td>{{$robo->codigoPostal}}</td>
                        <td>{{$robo->tipoLugar}}</td>
                        <td>{{$robo->descLugar}}</td>
                        <td>{{$robo->delito}}</td>
                        <td>{{$robo->armaAsociada}}</td>
                        <td>{{$robo->estatus}}</td>
                        <td> <a href="{{ route('robos.edit',$robo->id)}}">Editar</a>
                            <form action="{{ route('robos.destroy',$robo->id)}}" method="post" class="d.inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="submit" onclick="return confirm('¿Seguro que desea borrar este regitro?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
</div>