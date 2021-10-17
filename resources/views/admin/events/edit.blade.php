@extends('layouts.app')

@section('title') Editar Evento - 
    
@endsection


@section('content')

    <div class="row">
        <div class="col-12 my-5">
            <h3>Criar Evento</h3>
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.events.update', ['event' => $event->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Título Evento</label>
                    <input type="text" class="form-control" name="title" value="{{$event->title}}">
                </div>

                <div class="form-group">
                    <label for="">Descrição Rápida Evento</label>
                    <input type="text" class="form-control" name="description" value="{{$event->description}}">
                </div>

                <div class="form-group">
                    <label for="">Fale mais sobre o evento</label>
                    <textarea class="form-control" name="body" id="" cols="30" rows="10">{{$event->body}}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Quando vai acontecer?</label>
                    <input type="text" class="form-control" name="start_event" value="{{$event->start_event->format('d/m/Y H:i')}}">
                </div>

                <div class="form-group my-5">
                    <div class="row">
                        <div class="col-12">
                            Banner Evento
                            <hr>
                        </div>
                        <div class="col-4">
                            <img src="{{asset('storage/' . $event->banner)}}" alt="Banner do Evento {{$event->title}}" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <label>Carregar um Banner para o Evento</label>
                            <input type="file" name="banner" id="" class="form-control @error('banner') is-invalid @enderror">
                            @error('banner')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label></label>
                    <select class="form-control" multiple name="categories[]">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"
                                
                                @if($event->categories->contains($category))
                                    selected
                                @endif
                                
                                >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-lg btn-success">Editar Evento</button>

            </form>
        </div>
    </div>
    
@endsection




{{-- esse bloco js será inserido no app.blade.pp --}}
@section('scripts')
    <script>
        let el = document.querySelector('input[name=start_event]');
        let im = new Inputmask('99/99/9999 99:99');
        im.mask(el);
    </script>
@endsection