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
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="">Descrição Rápida Evento</label>
                    <input type="text" class="form-control" name="description">
                </div>

                <div class="form-group">
                    <label for="">Fale mais sobre o evento</label>
                    <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Quando vai acontecer?</label>
                    <input type="text" class="form-control" name="start_event">
                </div>

                <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>

            </form>
        </div>
    </div>
    
@endsection