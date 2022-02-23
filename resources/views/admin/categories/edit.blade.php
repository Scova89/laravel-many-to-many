@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Modifica categoria: {{$category->name}}</h3></div>

                    <div class="card-body">
                        <form action="{{route("categories.update", $category->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                              <label for="name">Nome</label>
                              <input type="text" class="form-control @error('name') is invalid @enderror" id="name" name="name" placeholder="Inserisci categoria" value="{{old('name', $category->name)}}">
                              @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Modifica</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    
@endsection