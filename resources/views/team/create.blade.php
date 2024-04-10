@extends('layouts.app')

@section('title', 'Create Team')

@section('content')
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">{{ __('Create new Team') }}</div>
				<div class="card-body"> 
					<table class="table">
						<form action="{{ route('teams.store') }}" method="POST">
							@csrf
							<div class="mb-3">
								<label for="name" class="form-label">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
								@error('name')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
							<div class="mb-3">
								<label for="year" class="form-label">Year Founded</label>
								<input type="number" class="form-control" id="year" name="year" placeholder="Year">
								@error('year')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
							<div>
								<button type="submit" class="btn btn-success">Save</button>
							</div>
						</form>
					</table>  
				</div>
			</div>
		</div>
	</div>
@endsection
