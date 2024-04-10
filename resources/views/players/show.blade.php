@extends('layouts.app')

@section('title', 'Players')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Players') }}</div>
                <div class="card-body">
                    @if(auth()->user() && (auth()->user()->is_admin))
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <a href="{{ route('players.create') }}" class="btn btn-primary">Add new Player</a>
                            </div>
                        </div> 
                    @endif
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Date of birthday</th>
                                    <th scope="col">Team</th>
                                    @if(auth()->user() && (auth()->user()->is_admin))
                                        <th class="text-center" colspan="2"  scope="col-2">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $player)
                                <tr>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->surname }}</td>
                                    <td>{{ $player->dob }}</td>
                                    <td>{{ $player->team->name }}</td>
                                    @if(auth()->user() && (auth()->user()->is_admin))
                                        <td>
                                            <a href="{{ route('players.edit', $player) }}" class="text-decoration-none">
                                                <i class="fa-solid fa-pen-to-square text-dark"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('players.destroy', $player)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-white d-block mx-auto"> <i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-start mt-4">
                            {{ $players->links('pagination::bootstrap-4') }}
                        </div>
                    </div>   
                </div>
            </div>
        </div>
@endsection
