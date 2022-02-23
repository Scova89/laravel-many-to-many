@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{$post->title}}</h3></div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-warning mb-2">Modifica</button></a>
                            <form action="{{route("posts.destroy", $post->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                        <div class="mb-3">
                            @if ($post->published)
                            <h6>Stato: <span class="badge badge-primary">Pubblicato</span></h6>
                                
                            @else
                            <h6>Stato: <span class="badge badge-danger">Bozza</span></h6>
                                
                            @endif
                        </div>

                        @if ($post->category)
                            <div class="mb-3">
                                <strong>Categoria</strong>
                                {{$post->category->name}}
                            </div>
                        @endif
                        
                        <div class="mb-3">
                        </div>  

                        {{$post->content}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection