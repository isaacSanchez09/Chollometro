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
                <h1 style="color: #FF7900;">Añadir Chollo</h1>
                <form action="{{ route('chollometro.store') }}" method='POST' enctype="multipart/form-data" class="mt-3">
                    @method('POST')
                    @csrf
                    <fieldset>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="titol">Titol:</label>
                                    <input type="text" name="title" value="{!! old('title') !!}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- Email input -->
                                <div class="form-outline">
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea  name="description" class="form-control" maxlength="200" rows="4">{!! old('description') !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="titol">Price:</label>
                                    <input type="number" name="price" value="{!! old('price') !!}" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label for="price_sale">Price Sale:</label>
                                    <input type="number" name="price_sale" value="{!! old('price_sale') !!}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <label for="url">Url:</label>
                                    <input type="text" name="url" value="{!! old('url') !!}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <select class="form-select mt-3" name="category">
                                        <option selected disabled>Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="form-outline">
                                <label for="url">Imagen:</label>
                                <input name="photo" type="file" />
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default btn-dark">Afegir</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
