@extends('layouts.site')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <form action="{{route('admin.events.photos.store', $event)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Subir fotos do evento</label>
                    <input type="file" multiple name="photos[]" id="" class="form-control">
                </div>
                <button class="btn btn-lg btn-success">Enviar Fotos do Evento</button>
            </form>
            <hr>
        </div>
    </div>

@endsection

photos bla bla