@extends('layouts.app')

@section('title', 'Edit')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Edit Team') }}</div>
            <div class="card-body">
                <div>
                    <table class="table">
                        <form action="{{ route('teams.update', $team) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $team->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Year Founded</label>
                                <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $team->year) }}">
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
