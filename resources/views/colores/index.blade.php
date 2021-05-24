<div class="container">

    <a href="{{route('colores.create')}}"> Ingresar</a>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>ID_COLOR</th>
                <th>DESCRIPCION</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colores as $color)
                <tr>
                    <td>{{$color->id}}</td>
                    <td>{{$color->descripcion}}</td>
                    <td> <a href="{{ route('colores.edit',$color->id)}}">Editar</a>
                         <form action="{{ route('colores.destroy',$color->id)}}" method="post" class="d.inline">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="submit" onclick="return confirm('¿Seguro que desea borrar este regitro?')" value="Borrar">
                         </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>