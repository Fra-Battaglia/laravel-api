@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col py-5">
				<div class="d-flex justify-content-between mb-3">
					<h3 class="fw-bold">LISTA PROGETTI</h3>
					<a href="{{ route('admin.projects.create') }}"><button class="btn btn-primary">Aggiungi progetto</button></a>
				</div>
				@if ($projects->isEmpty())
					<div class="d-flex justify-content-center">
						<div class="alert alert-warning m-0 w-auto">Nessun progetto, <a href="{{ route('admin.projects.create') }}">clicca qui</a> per crearne uno</div>
					</div>
				@else
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Titolo</th>
								<th>Content</th>
								<th>Categoria</th>
								<th>Tecnologie</th>
								<th>Slug</th>
								<th>Controllers</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($projects as $item)
								<tr>
									<td class="px-3">{{ $item['id'] }}</td>
									<td>{{ $item['title'] }}</td>
									<td>{{ $item['content'] }}</td>
									<td>{{ $item->type ? $item->type->name : 'nessuna categoria' }}</td>
									<td> 
										@forelse($item->technologies as $tag)
										{{$tag->name}}
										@empty
										Nessuna Tecnologia
										@endforelse
									</td>
									<td>{{ $item['slug'] }}</td>
									<td>
										<div class="d-flex gap-2">
											<a href="{{ route('admin.projects.edit', $item) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
											<a href="{{ route('admin.projects.show', $item->slug) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
											<a>
												<form action="{{ route('admin.projects.destroy', ['project' => $item['slug']]) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit" value="Cancella" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
												</form>
											</a>
										</div>
									</td>	
								</tr>	
							@endforeach
						</tbody>
					</table>
				@endif
			</div>
		</div>
	</div>
@endsection