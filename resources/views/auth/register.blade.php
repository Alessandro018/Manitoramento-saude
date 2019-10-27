@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right">{{ __('Tipo sanguíneo') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" name="tipo_sanguineo" selected="{{ old('tipo_sanguineo') }}" required>
                                    <option disabled selected>Selecione</option>
                                    <option>A-</option>
                                    <option>A+</option>
                                    <option>B-</option>
                                    <option>B+</option>
                                    <option>AB-</option>
                                    <option>AB+</option>
                                    <option>O-</option>
                                    <option>O+</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de conta') }}</label>

                            <div class="col-md-6">
                                <?php
                                    if(old('tipo')=='doutor'){ ?>
                                        <input type="radio" name="tipo" value="doutor" require checked><label for="exampleFormControlSelect1" class="col-md-4 col-form-label">Doutor</label>
                                        <input type="radio" name="tipo" value="usuario" require><label for="exampleFormControlSelect1" class="col-md-4 col-form-label ">Usuário</label>
                                    <?php }elseif(old('tipo')=='usuario'){ ?>
                                        <input type="radio" name="tipo" value="doutor" require><label for="exampleFormControlSelect1" class="col-md-4 col-form-label ">Doutor</label>
                                        <input type="radio" name="tipo" value="usuario" require checked><label for="exampleFormControlSelect1" class="col-md-4 col-form-label">Usuário</label>
                                    <?php }else{ ?>
                                        <input type="radio" name="tipo" value="doutor" require><label for="exampleFormControlSelect1" class="col-md-4 col-form-label ">Doutor</label>
                                        <input type="radio" name="tipo" value="usuario" require><label for="exampleFormControlSelect1" class="col-md-4 col-form-label ">Usuário</label>
                                    <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
