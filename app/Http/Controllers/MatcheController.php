<?php

namespace App\Http\Controllers;

use App\Models\Matche;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MatcheController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = Matche::all();

        return view('match.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();

        return view('match.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'home_id'   => ['required', 'integer', 'exists:teams,id'],
            'away_id'   => ['required', 'integer', 'exists:teams,id'],
            'game_date' => ['required', 'date', function ($attribute, $value, $fail) {
                $inputDate = Carbon::parse($value);
                $currentDate = now();
                $twentyFourHoursAgo = $currentDate->subHour(48);
                if (!$inputDate->greaterThan($twentyFourHoursAgo)) {
                    $fail('The ' . $attribute . ' must not be older then 24 hours from the current date.');
                }
            }]
        ]);

        $params = [
            'home_id'   => $request->input('home_id'),
            'away_id'   => $request->input('away_id'),
            'game_date' => $request->input('game_date'),
        ];

        $match = Matche::create($params);

        if ($match) {
            return redirect()->route('matches.create')->with('success', 'Match successfully created!');
        } else {
            return redirect()->route('teams.create')->with('error', 'something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Matche $matche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matche $matche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matche $matche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matche $matche)
    {
        //
    }
}
