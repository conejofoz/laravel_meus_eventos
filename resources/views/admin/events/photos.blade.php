@extends('layouts.site')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <form action="{{route('admin.events.photos.store', $event)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Subir fotos do evento</label>
                    <input type="file" multiple name="photos[]" id="" class="form-control @error('photos.*') is-invalid @enderror">
                    @error('photos.*')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-lg btn-success">Enviar Fotos do Evento</button>
            </form>
            <hr>
        </div>
    </div>

    <div class="row">
        @forelse ($event->photos as $photo)
            <div class="col-4 mb-4 text-center">
                <img src="{{asset('storage/' . $photo->photo)}}" alt="Fotos do evento {{$event->title}}" class="img-fluid">
                <form action="{{route('admin.events.photos.destroy', [$event, $photo])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mt-1">Remover Foto</button>
                </form>
            </div>
        @empty
           <div class="col-12">
               <div class="alert alert-warning">Nenhuma foto registrada para este evento...</div>
           </div> 
        @endforelse
    </div>

@endsection
