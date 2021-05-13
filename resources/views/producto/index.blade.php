@extends('layouts.app')

@section('content')
<div class="container">

        @if(Session::has('mensaje'))
        <div class="alert alert-info" alert-dismissible role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        @endif

<a class="btn btn-dark" href="{{ url('producto/create') }}">Hacer Pedido</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>nombre producto</th>
            <th>Foto</th>
            <th>Direccion de Entrega</th>
        </tr>
    </thead>

    <tbody>
        @foreach($producto as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre_producto }}</td>
            <td>
                <img class="rounded figure-img img-fluid" src="{{ asset('storage').'/'.$producto->foto }}" width="100" alt="">
            </td>


            <td>{{ $producto->direccion_de_entrega }}</td>
            <td>

                <a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn btn-warning">
                   Editar
                </a>
                |

                <form action="{{ url('/producto/'.$producto->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Estas seguro que deseas cancelar el pedido?')" value="Borrar" class="btn btn-outline-info">


                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $producto->links() !!}
</div>
@endsection
