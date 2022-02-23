@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Nuovo post</h3></div>

                    <div class="card-body">
                        <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                              <label for="title">Titolo</label>
                              <input type="text" class="form-control @error('title') is invalid @enderror" id="title" name="title" placeholder="Inserisci titolo" value="{{old('title')}}">
                              @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Contenuto</label>
                                <textarea class="form-control @error('content') is invalid @enderror" id="content" name="content" placeholder="Inserisci contenuto">{{old('content')}}</textarea>
                                @error('content')
                                  <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <select class="custom-select @error('content') is invalid @enderror" name="category_id" id="category">
                                  <option value="" {{old("category_id") == "" ? "selected" : ""}}>Seleziona una categoria</option>
                                  @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old("category_id") == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                  @endforeach
                                </select>
                                @error('category_id')
                                  <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h4>Tags</h4>
                                @foreach ($tags as $tag)
                                  <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}">
                                    <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                                  </div>
                                @endforeach
                                
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input @error('published') is invalid @enderror" id="published" name="published" {{old('content') ? 'checked' : ''}}>
                                <label class="form-check-label" for="published">Pubblica</label>
                                @error('published')
                                <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            </div>

                            <div class="custom-file mb-3">
                              <input type="file" class="custom-file-input" id="image" name="image">
                              <label class="custom-file-label" for="image">Aggiungi immagine</label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Crea</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    
@endsection