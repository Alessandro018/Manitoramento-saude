@extends('layouts.app')

@section('content')

    <table class="table table-bordered">
		<tr>
			<th>Data do checkup</th>
			<th>Tipo sanguíneo</th>
			<th>Peso</th>
			<th>Altura</th>
            <th>Pressão arterial</th>
            <th>Nivel de glicose</th>
            <th>Colesterol LDL</th>
            <th>Colesterol HDL</th>
            <th>Observações</th>
		</tr>

		<tr>
			<td style="overflow: hidden;text-overflow: ellipsis;white-space: wrap;">{{ $checkup->data_checkup }}</td>
			<td>{{Auth()->user()->tipo_sanguineo}}</td>
			<td>{{ $checkup->peso }}</td>
			<td>{{ $checkup->altura }}</td>
			<td>{{ $checkup->pressao_arterial }}</td>
            <td>{{ $checkup->nivel_glicose }}</td>
            <td>{{ $checkup->colesterol_LDL }}</td>
            <td>{{ $checkup->colesterol_HDL }}</td>
            <td>{{ $checkup->observacoes }}</td>
		</tr>
	</table>

@endsection