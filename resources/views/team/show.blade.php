@extends('layouts.app')

@section('title', 'Teams')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teams') }}</div>
                <div class="card-body">
                    @if(auth()->user() && (auth()->user()->is_admin))
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <a href="{{ route('teams.create')}}" class="btn btn-primary">Add new Team</a>
                            </div>
                        </div> 
                    @endif
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Year Founded</th>
                                    @if(auth()->user() && (auth()->user()->is_admin))
                                        <th class="text-center" colspan="2"  scope="col-2">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->year }}</td>
                                        @if(auth()->user() && (auth()->user()->is_admin))
                                            <td>
                                                <a href="{{ route('teams.edit', $team) }}" class="text-decoration-none">
                                                    <i class="fa-solid fa-pen-to-square text-dark"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('teams.destroy', $team) }}" method="POST">
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
                    </div>   
                </div>
            </div>
        </div>
@endsection
