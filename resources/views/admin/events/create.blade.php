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
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            @foreach ($errors->get('title') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Descrição Rápida Evento</label>
                    <input type="text" class="form-control @if($errors->has('description')) is-invalid @endif" name="description">
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            @foreach ($errors->get('title') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Fale mais sobre o evento</label>
                    <textarea class="form-control @if($errors->has('body')) is-invalid @endif" name="body" id="" cols="30" rows="10"></textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            @foreach ($errors->get('title') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Quando vai acontecer?</label>
                    <input type="text" class="form-control @if($errors->has('start_event')) is-invalid @endif" name="start_event">
                    @if ($errors->has('start_event'))
                        <div class="invalid-feedback">
                            @foreach ($errors->get('title') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>

            </form>
        </div>
    </div>
    
@endsection