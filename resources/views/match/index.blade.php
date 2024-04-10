@extends('layouts.app')

@section('title', 'Matches')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Matches') }}</div>
            <div class="card-body">
                @if(auth()->user() && (auth()->user()->is_admin))
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <a href="{{ route('matches.create') }}" class="btn btn-primary">Add new Match</a>
                        </div>
                    </div> 
                @endif
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Home Team</th>
                                <th scope="col">Guest Team</th>
                                <th scope="col">Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matches as $match)
                                <tr>
                                    <td>{{ $match->homeTeam->name }}</td>
                                    <td>{{ $match->awayTeam->name }}</td>
                                    <td>
                                        @if(!is_null($match->home_score) && !is_null($match->away_score))
                                            {{ $match->home_score }}:{{ $match->away_score }}
                                        @else
                                            /
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>   
            </div>
        </div>
    </div>
@endsection
