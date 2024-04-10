@extends('layouts.app')

@section('title', 'Create Match')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Create new Match') }}</div>
            <div class="card-body"> 
                <table class="table">
                    <form action="{{ route('matches.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="team" class="form-label">Home Team</label>
                            <select name="home_id" id="team"  class="form-control">
                                <option disabled selected>Choise Team</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="team2" class="form-label">Guest Team</label>
                            <select name="away_id" id="team"  class="form-control">
                                <option disabled selected>Choise Team</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label for="game_date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="game_date" name="game_date">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </table>  
            </div>
        </div>
    </div>
@endsection
