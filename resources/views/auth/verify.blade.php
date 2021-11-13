@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Reenviamos um link novo de verificação de conta.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor verifique seu E-mail, enviamos un link de ativação.') }}
                    {{ __('Se voce não recebeu o E-mail.') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para receber um novo link.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
