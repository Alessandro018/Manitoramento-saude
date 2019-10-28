@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Check-ups</h2>
	@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="row justify-content-center">
		<table class="table" style="width: 600px; text-align: center;">
		  	<thead>
		    	<tr>
				    <th scope="col">Data</th>
				    <th scope="col">Cliente</th>
				    <th scope="col">Ações</th>
		    	</tr>
		    </thead>
		    <tbody>
				@foreach($checkups as $checkup)
					<tr>
						<td>{{ $checkup->data_checkup }}</td>
						<td>{{ $checkup->usuario->name }}</td>
						<td><a href="">Detalhes</a><a href="">Editar</a>
							<a href="{{ action('CheckupController@destroy',$checkup->id) }}">Excluir</a></td>
					</tr>
				@endforeach
		    </tbody>
		</table>
	</div>
</div>
@endsection