@extends('./layouts/plantilla')
@section('titulo', 'Llistat de posts')
@section('contenido')
    <div class="container mt-5">
        @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="row alert alert-danger alert-dismissible mt-4">
                        <strong>{{ $error }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="cleanErrorMessage(error)"></button>
                    </div>
                @endforeach
        @endif
        <div class="row justify-content-center rounded" style="background-color: white">
            <div class="col-10 mt-3 mb-3">
                <h1 style="color: #FF7900;">Editar Chollo {{$chollo->id}}</h1>
                <form action="{{ route('chollometro.update', $chollo) }}" method='POST' enctype="multipart/form-data" class="mt-3">
                    @method('PUT')
                    @csrf
                    <fieldset>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="titol">Titol:</label>
                                    <input type="text" name="title" value="{{$chollo->title}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- Email input -->
                                <div class="form-outline">
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea  name="description" class="form-control" maxlength="200" rows="4">{{$chollo->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="titol">Price:</label>
                                    <input type="number" name="price" value="{{$chollo->price}}" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label for="price_sale">Price Sale:</label>
                                    <input type="number" name="price_sale" value="{{$chollo->price_sale}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="url">Url:</label>
                                    <input type="text" name="url" value="{{$chollo->url}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <select class="form-select mt-3" name="category">
                                        <option disabled>Category</option>
                                        @foreach($categories as $category)
                                            @if($category->id == $chollo->$category)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="form-outline">
                                <div>
                                    Imagen seleccionada:
                                    <img src="{{asset("storage/img/$chollo->id-ganga-severa.jpg")}}" width="100px">
                                </div>
                                <div class="mt-3">
                                    <label for="url">Cambiar imagen:</label>
                                    <input name="photo" type="file"/>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default btn-dark">Editar</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
