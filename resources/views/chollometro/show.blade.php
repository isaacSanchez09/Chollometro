@extends('./layouts/plantilla')
@section('titulo', 'Fitxa post')
@section('contenido')
    <div class="container" style="width: 70%;">
    <div class="row justify-content-center mt-1">
        <div class="card border-warning">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex col-12 mb-2 col-xl-5 mb-xl-0 justify-content-center">
                        <img src="{{asset("storage/img/$chollo->id-ganga-severa.jpg")}}" class="img-fluid">
                    </div>
                    <div class="col-12 col-xl-7">
                        <div class="card" style="width: 8rem; display: inline-block">
                            <a href="{{route('vote', ['id' => $chollo->id, 'rate' => 0])}}"><button class="btn" style="color: cornflowerblue; float: left"><i class="fa fa-thin fa-minus"></i></button></a>
                            <p class="d-flex align-items-center" style="color:red;float: left; margin-top: 5px">
                                {{round($chollo->rated)}}º
                            </p>
                            <a href="{{route('vote', ['id' => $chollo->id, 'rate' => 1])}}"><button class="btn" style="color: red;"><i class="fa fa-thin fa-plus"></i></button></a>
                        </div>
                        <h5 class="card-title mt-1">{{$chollo->title}}</h5>
                        <div class="card-text">
                            <span class="me-2" style="color: #FF7900;"><strong>{{$chollo->price_sale}}€</strong></span>
                            <span class="me-2" style="color: #8F949B;"><del>{{$chollo->price}}€</del></span>
                        </div>
                        <p class="card-text">{{$chollo->description}}</p>
                        <footer class="blockquote-footer mt-5 col-6">
                            Chollo ofrecido por: {{\App\Models\User::find($chollo->user_id)->name}}
                            <br>
                            Miembro desde: {{\App\Models\User::find($chollo->user_id)->created_at}}
                        </footer>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-end">
                    @if(Auth::check() && (Auth::user()->id === $chollo->user->id))
                        <div class="d-flex justify-content-end align-items-end col-6 me-2">
                            <a href=" {{route('chollometro.edit' , $chollo->id)}}"><button type="button" class="btn btn-warning mt-2 me-3">Editar</button></a>
                            <form action="{{ route('chollometro.destroy', $chollo) }}" method="POST" class="float-right mt-3 me-2">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    @endif
                    <a href="{{$chollo->url}}"><button class="btn" style="background-color: #FF7900; color: white">Ir al chollo</button></a>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <h1 class="mt-3">Comentaris</h1>
            @foreach($chollo->comentari as $comentari)
                <div class="card mb-3 p-0">
                    <div class="card-header">
                        {{$comentari->user->name}}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{$comentari->contingut}}</p>
                            <footer class="blockquote-footer">{{\Carbon\Carbon::parse($comentari->created_at)->format('d/m/Y')}}</cite></footer>
                        </blockquote>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
