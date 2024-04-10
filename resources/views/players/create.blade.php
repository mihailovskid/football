@extends('layouts.app')

@section('title', 'Create Player')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Create new Player') }}</div>
            <div class="card-body"> 
                <div>
                    <table class="table">
                        <form action="{{ route('players.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                @error('name')
									<small class="text-danger">{{ $message }}</small>
								@enderror
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
                                @error('surname')
									<small class="text-danger">{{ $message }}</small>
								@enderror
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of birth</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                                @error('dob')
									<small class="text-danger">{{ $message }}</small>
								@enderror
                            </div>
                            <div class="mb-3">
                                <label for="team" class="form-label">Team</label>
                                <select name="team_id" id="team"  class="form-control">
                                    <option disabled selected>Choise Team</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                                @error('team_id')
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
