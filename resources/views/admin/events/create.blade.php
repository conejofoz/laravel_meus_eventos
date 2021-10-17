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
            <form action="{{route('admin.events.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Título Evento</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Descrição Rápida Evento</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description">
                    @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Fale mais sobre o evento</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="" cols="30" rows="10"></textarea>
                    @error('body')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Quando vai acontecer?</label>
                    <input type="text" class="form-control @error('start_event') is-invalid @enderror" name="start_event">
                    @error('start_event')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Carregar um Banner para o Evento</label>
                    <input type="file" name="banner" id="" class="form-control @error('banner') is-invalid @enderror">
                    @error('banner')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label></label>
                    <select class="form-control" multiple name="categories[]">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>

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