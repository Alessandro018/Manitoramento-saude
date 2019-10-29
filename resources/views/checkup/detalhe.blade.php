@extends('layouts.app')

@section('content')

    <table class="table table-bordered">
		<tr>
            <th>Paciente</th>
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
            <td>{{ $users->name }}</td>
			<td style="overflow: hidden;text-overflow: ellipsis;white-space: wrap;">{{ $checkups->data_checkup }}</td>
			<td>{{ $users->tipo_sanguineo }}</td>
			<td>{{ $checkups->peso }}</td>
			<td>{{ $checkups->altura }}</td>
			<td>{{ $checkups->pressao_arterial }}</td>
            <td>{{ $checkups->nivel_glicose }}</td>
            <td>{{ $checkups->colesterol_LDL }}</td>
            <td>{{ $checkups->colesterol_HDL }}</td>
            <td>{{ $checkups->observacoes }}</td>
		</tr>
	</table>

@endsection