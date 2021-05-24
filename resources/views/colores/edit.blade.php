<div class="container">
    <form action="{{ route('colores.update',$color->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH')}}
        @include('colores.form',['modo'=>'Editar'])
    </form>
</div>