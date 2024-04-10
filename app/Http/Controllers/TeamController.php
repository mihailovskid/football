<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();

        return view('team.show', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:50'],
            'year'    => ['required', 'string', 'max:6'],
        ]);

        $params = [
            'name'      => $request->input('name'),
            'year'      => $request->input('year'),
        ];

        $team = Team::create($params);

        if ($team) {
            return redirect()->route('teams.index')->with('success', 'Team successfully created!');
        } else {
            return redirect()->route('teams.index')->with('error', 'something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Team $team)
    {
        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:50'],
            'year'  => ['required', 'integer', 'digits:4'],
        ]);

        $params = [
            'name'  => $request->input('name'),
            'year'  => $request->input('year'),
        ];

        $updated = $team->update($params);

        if ($updated) {
            return redirect()->route('teams.index')->with('success', 'Team successfully updated!');
        } else {
            return redirect()->route('teams.edit', $team)->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $deleted = $team->delete();

        if ($deleted) {
            return redirect()->route('teams.index')->with('success', 'Team successfully delleted');
        } else {
            return redirect()->route('teams.index')->with('error', 'Something went wrong!');
        }
    }
}
