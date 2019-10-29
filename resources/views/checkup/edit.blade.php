@extends('layouts.app')
   
@section('content')  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <?php
        $pacientes = DB::table('users')->select('users.*')->where('tipo', 'usuario')->get();
    ?>
    <form action="{{ route('checkup.update', $checkup->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group row"s>
                <label class="col-md-4 col-form-label text-md-right">Paciente</label>
                <div class="col-md-6">
                    <select class="custom-select" name="user_id" required>
                        @foreach($pacientes as $paciente)
                            @if($paciente->id == $checkup->user_id)
                                <option value="{{$paciente->id}}" selected>{{$paciente->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

                <div class="col-md-6">
                    <input id="data" type="datetime-local" class="form-control @error('data') is-invalid @enderror" name="data_checkup" value="{{$checkup->data_checkup}}" required autofocus>

                    @error('data')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="peso" class="col-md-4 col-form-label text-md-right">{{ __('Peso') }}</label>

                <div class="col-md-6">
                    <input id="peso" type="number" class="form-control @error('peso') is-invalid @enderror" name="peso" value="{{$checkup->peso}}" min="0"  step=".01" max="250" required autofocus>

                    @error('peso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="altura" class="col-md-4 col-form-label text-md-right">{{ __('Altura') }}</label>

                <div class="col-md-6">
                    <input id="altura" type="number" class="form-control @error('altura') is-invalid @enderror" name="altura" value="{{ $checkup->altura }}" max="2.80" step=".01" required autofocus>

                    @error('altura')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="pressao_arterial" class="col-md-4 col-form-label text-md-right">{{ __('Pressão arterial') }}</label>

                <div class="col-md-6">
                    <input id="pressao_arterial" type="text" class="form-control @error('pressao_arterial') is-invalid @enderror" name="pressao_arterial" value="{{ $checkup->pressao_arterial }}" maxlength="25" required autofocus>

                    @error('pressao_arterial')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="nivel_glicose" class="col-md-4 col-form-label text-md-right">{{ __('Nível de glicose') }}</label>

                <div class="col-md-6">
                    <input id="nivel_glicose" type="number" class="form-control @error('nivel_glicose') is-invalid @enderror" name="nivel_glicose" value="{{ $checkup->nivel_glicose }}" max="250" required autofocus>

                    @error('nivel_glicose')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="colesterol_LDL" class="col-md-4 col-form-label text-md-right">{{ __('Colesterol LDL') }}</label>

                <div class="col-md-6">
                    <input id="colesterol_LDL" type="number" class="form-control @error('colesterol_LDL') is-invalid @enderror" name="colesterol_LDL" value="{{ $checkup->colesterol_LDL }}" max="250" step=".01" required autofocus>

                    @error('colesterol_LDL')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="colesterol_HDL" class="col-md-4 col-form-label text-md-right">{{ __('Colesterol HDL') }}</label>

                <div class="col-md-6">
                    <input id="colesterol_HDL" type="number" class="form-control @error('colesterol_HDL') is-invalid @enderror" name="colesterol_HDL" value="{{ $checkup->colesterol_HDL }}" max="250" step=".01" required autofocus>

                    @error('colesterol_HDL')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="observacoes" class="col-md-4 col-form-label text-md-right">{{ __('Observações') }}</label>

                <div class="col-md-6">
                    <textarea id="observacoes" class="form-control @error('observacoes') is-invalid @enderror" name="observacoes" max="250" autofocus>{{ $checkup->observacoes }}</textarea>

                    @error('observacoes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Atualizar') }}
                </button>
                <input type="hidden" value="1" name="user_id">
            </div>
    </form>
@endsection