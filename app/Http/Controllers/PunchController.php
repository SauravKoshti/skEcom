<?php

namespace App\Http\Controllers;

use App\Models\Punch;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PunchController extends Controller
{
    public function punchIn()
    {
        Punch::create(['punch_in' => now()]);
        return view('user.punchwelcome');
        // return redirect()->route('punchIn')->with('success', 'Punch-in recorded successfully.');
    }

    public function punchOut()
    {
        $latestPunch = Punch::latest('id')->first();
        $latestPunch->update(['punch_out' => now()]);
        return view('user.punchwelcome');
        // return redirect()->route('/')->with('success', 'Punch-out recorded successfully.');
    }

    public function calculateTotalTime()
    {
        $punches = Punch::all();

        $totalTime = [0, 0, 0];

        foreach ($punches as $punch) {
            if ($punch->punch_out) {
                $punchInTime = Carbon::parse($punch->punch_in);
                $punchOutTime = Carbon::parse($punch->punch_out);

                $timeDifference = $punchOutTime->diff($punchInTime);

                $totalTime[0] += $timeDifference->h;
                $totalTime[1] += $timeDifference->i;
                $totalTime[2] += $timeDifference->s;
            }
        }

        return $totalTime;
    }
}
