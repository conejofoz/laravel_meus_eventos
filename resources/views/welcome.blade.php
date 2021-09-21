@extends('layout.site')

@section('title') Lista de eventos @endsection

@section('content')

    <div class="col-12">
        <h2>Eventos</h2>
        <hr>
    </div>


    <div class="row mb-4">
        
            @forelse ($events as $event)
                <div class="col-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/640x480.png/00ee88?text=ut" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{$event->title}}</h5>
                            <strong>Acontece em: {{$event->start_event}}</strong>
                            <p class="card-text">{{$event->description}}</p>
                        </div>
                    </div>
                </div>
                {{-- a cada 3 fechar uma div e abrir uma div row --}}
                @if (($loop->iteration % 3) == 0)
                    </div> <div class="row mb-4">
                @endif
            @empty
                <div class="alert alert-warning">Nenhum evento cadastrado</div>
            @endforelse
    </div>


    
@endsection