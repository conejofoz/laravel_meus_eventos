@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <form action="{{route('admin.profile.update')}}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-12">
                        <h3>Dados de Acesso</h3>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" class="form-control" name="user[name]" value="{{$user->name}}">
                </div>
                
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" name="user[email]" value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="text" class="form-control" name="user[password]">
                </div>

                <div class="form-group">
                    <label>Confirmar Senha</label>
                    <input type="text" class="form-control" name="user[password_confirm]">
                </div>

                @if ($user->profile)
                <div class="row">
                    <div class="col-12">
                        <h3>Dados de Perfil</h3>
                    </div>
                </div>

                <div class="form-group">
                    <label>Sobre</label>
                    <textarea name="profile[about]" id="" cols="30" rows="10" class="form-control">{{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <label>Contato</label>
                    <input type="text" class="form-control" name="profile[phone]" value="{{$user->profile->phone}}">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control" name="">
                </div>
                @endif

            </form>
        </div>
    </div>
@endsection