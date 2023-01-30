@extends('./layouts/plantilla')
@section('titulo', 'Chollometro')
@section('contenido')
    <div class="container" style="width: 70rem;">
        <h1 class="mt-2">Listado Categorias</h1>
        <div class="row">
            <div class="col-6">
                <table class="table col-6">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $categoria)
                        <tr>
                            <th scope="row">{{$categoria->id}} </th>
                            <td>{{$categoria->name}} </td>
                            @if(Auth::user() && Auth::user()->rol === "admin")
                                <td><form action="{{ route('delCategory', $categoria->id) }}" method="POST" class="float-right mt-3 me-2">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger"><i class="fa fa-solid fa-trash"></i></button>
                                </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(Auth::user() && Auth::user()->rol === "admin")
                <div class="col-6">
                    <form action="{{ route('addCategory') }}" method='POST'>
                        @method('POST')
                        @csrf
                        <fieldset>
                            <legend class="bg-dark text-white text-center" id="tituloForm">Añadir categoria</legend>
                            <div class="form-group">
                                <label for="newprod-id">Nombre:</label>
                                <input type="text" name="nombre" class="form-control"/>
                            </div>
                            <button type="submit" class="btn btn-default btn-dark mt-2">Añadir</button>
                        </fieldset>
                    </form>
                </div>
            @endif
        </div>
    </div>

@endsection
