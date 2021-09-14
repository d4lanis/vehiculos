@extends('layouts.adminlayout')
@section('content')
    <div class="container">
        <br>
        <h2>Catalogos</h2>
        <table id="catalogos" class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Entidades</td>
                    <td><a href="catalogos/1" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Municipios</td>
                    <td><a href="catalogos/2" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Localidades</td>
                    <td><a href="catalogos/3" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Marcas</td>
                    <td><a href="catalogos/4" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Submarcas</td>
                    <td><a href="catalogos/5" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Colores</td>
                    <td><a href="catalogos/6" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Clases de Vehiculo</td>
                    <td><a href="catalogos/7" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Tipos de Vehiculo</td>
                    <td><a href="catalogos/8" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Tipos de  Uso</td>
                    <td><a href="catalogos/9" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Tipos de Lugares</td>
                    <td><a href="catalogos/10" class="btn btn-success">Ver</a></td>
                </tr>
                <tr>
                    <td>Procedencias</td>
                    <td><a href="catalogos/0" class="btn btn-success">Ver</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection