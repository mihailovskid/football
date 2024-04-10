<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::paginate(10);
        return view('players.show', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('players.create', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'dob'     => ['required', 'date_format:Y-m-d'],
            'team_id' => ['required', 'numeric', 'exists:teams,id']
        ]);

        $params = [
            'name'      => $request->input('name'),
            'surname'   => $request->input('surname'),
            'dob'       => $request->input('dob'),
            'team_id'   => $request->input('team_id')
        ];

        $player = Player::create($params);

        if ($player) {
            return redirect()->route('players.index')->with('success', 'Player successfuly created!');
        } else {
            return redirect()->route('players.create')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'dob'     => ['required', 'date_format:Y-m-d'],
            'team_id' => ['required', 'numeric', 'exists:teams,id']
        ]);

        $params = [
            'name'      => $request->input('name'),
            'surname'   => $request->input('surname'),
            'dob'       => $request->input('dob'),
            'team_id'   => $request->input('team_id')
        ];

        $updated = $player->update($params);

        if ($updated) {
            return redirect()->route('players.index')->with('success', 'Player successfuly updated!');
        } else {
            return redirect()->route('players.create')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $deleted = $player->delete();

        if ($deleted) {
            return redirect()->route('players.index')->with('success', 'Player successfully delleted');
        } else {
            return redirect()->route('players.index')->with('error', 'Something went wrong!');
        }
    }
}
