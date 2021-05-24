<div class="container">
    <form action="{{ url('colores') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('colores.form',['modo'=>'Ingresar'])
    </form>
</div>