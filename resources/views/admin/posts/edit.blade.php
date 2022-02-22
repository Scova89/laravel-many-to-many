@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Modifica post: {{$post->title}}</h3></div>

                    <div class="card-body">
                        <form action="{{route("posts.update", $post->id)}}" method="POST">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                              <label for="title">Titolo</label>
                              <input type="text" class="form-control @error('title') is invalid @enderror" id="title" name="title" placeholder="Inserisci titolo" value="{{old('title') ? old('title') : $post->title}}">
                              @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Contenuto</label>
                                <textarea class="form-control @error('content') is invalid @enderror" id="content" name="content" placeholder="Inserisci contenuto">{{old('content') ? old('content') : $post->content}}</textarea>
                                @error('content')
                                <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <select class="custom-select @error('content') is invalid @enderror" name="category_id" id="category">
                                  <option value="" {{old("category_id") == "" ? "selected" : ""}}>Seleziona una categoria</option>
                                  @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old("category_id", $post->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                  @endforeach
                                </select>
                                @error('category_id')
                                  <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                @php
                                    $published = old('published') ? old('published') : $post->published;  
                                @endphp

                                <input type="checkbox" class="form-check-input @error('published') is invalid @enderror" id="published" name="published" {{$published ? 'checked' : ''}}>
                                
                                <label class="form-check-label" for="published">Pubblica</label>
                                @error('published')
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