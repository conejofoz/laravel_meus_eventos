@extends('layouts.app')

@section('title') Criar Evento - 
    
@endsection


@section('content')

    <div class="row">
        <div class="col-12 my-5">
            <h3>Criar Evento</h3>
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <form action="/admin/events/store" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Título Evento</label>
                    <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title">
                    <div class="invalid-feedback">
                        @foreach ($errors->get('title') as $error)
                            {{$error}}
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Descrição Rápida Evento</label>
                    <input type="text" class="form-control @if($errors->has('description')) is-invalid @endif" name="description">
                    <div class="invalid-feedback">
                        @foreach ($errors->get('description') as $error)
                            {{$error}}
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Fale mais sobre o evento</label>
                    <textarea class="form-control @if($errors->has('body')) is-invalid @endif" name="body" id="" cols="30" rows="10"></textarea>
                    <div class="invalid-feedback">
                        @foreach ($errors->get('title') as $error)
                            {{$error}}
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Quando vai acontecer?</label>
                    <input type="text" class="form-control @if($errors->has('start_event')) is-invalid @endif" name="start_event">
                    <div class="invalid-feedback">
                        @foreach ($errors->get('start_event') as $error)
                            {{$error}}
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>

            </form>
        </div>
    </div>
    
@endsection