@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col py-5">

				{{-- Errori --}}
				@if ($errors->any())
					<div class="errors">
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif

				{{-- Form di creazione --}}
				<div class="d-flex justify-content-between mb-3">
					<h3 class="fw-bold">CREA UNA NUOVA CATEGORIA</h3>
					<a href="{{ route('admin.types.index') }}"><button class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-2"></i>Torna alla lista categorie</button></a>
				</div>
				<form action="{{route("admin.types.store")}}" method="POST" class="py-4 comic-form">
					@csrf
					<div class="mb-4">
						<label for="" class="form-label">Nome</label>
						<input type="text" id="" aria-describedby="" name="name" class="form-control" placeholder="Aggiungi titolo">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Crea progetto</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection