@extends('./layouts/plantilla')
@section('titulo', 'Chollometro')
@section('contenido')
    <div class="container" style="width: 70rem;">
        @if(count($chollos) == 0)
            <h2>Aun no tienes chollos</h2>
        @else
        <h1>Chollos de {{Auth::user()->name}}</h1>
    @foreach($chollos as $chollo)
            <div class="row justify-content-center mt-2">
                <div class="card border-warning" style="border: 2px dashed">
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
                                <div class="d-flex justify-content-end">
                                    <a href="{{route('chollometro.show' , $chollo)}}"><button class="btn" style="background-color: #FF7900; color: white">Ver chollo</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
        <div class="row justify-content-center mt-4">
            {{  $chollos->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>

@endsection
