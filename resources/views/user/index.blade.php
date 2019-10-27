@extends('layouts.app')

@section('content')

    <table class="table table-bordered">
		<tr>
			<th>Data do checkup</th>
			<th>Action</th>
		</tr>
		@foreach ($checkups as $checkup)
		<tr>
			<td style="overflow: hidden;text-overflow: ellipsis;white-space: wrap;">{{ $checkup->data_checkup }}</td>
			<td>		
				<a class="btn btn-primary" href="{{ url('/user/listar'.$checkup->id) }}">Detalhar</a>
            </td>
		</tr>
		@endforeach
	</table>

@endsection