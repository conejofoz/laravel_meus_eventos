@extends('layouts.site')

@section('content')
    <div class="rol">
        <div class="col-12">
            <h2>Confirmação de Inscrição</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p>
                Evento: <strong>{{$event->title}}</strong>
                Dia: <strong>{{$event->start_event->format('d/m/Y H:i')}}</strong>
            </p>

            <p>
                <a href="{{route('enrollment.proccess')}}" class="btn btn-lg btn-success">Confirmar Inscrição</a>
            </p>
        </div>
    </div>

@endsection