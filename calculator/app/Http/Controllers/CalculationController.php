<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;

class CalculationController extends Controller
{
    public function calculate(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'expression' => 'required|string',
        ]);

        // Perform the calculation (this is a very basic example, you'll need to replace this with your actual calculation logic)
        $result = eval('return ' . $data['expression'] . ';');

        // Save the calculation in the database
        $calculation = auth()->user()->calculations()->create([
            'calculation' => $data['expression'],
            'result' => $result,
        ]);

        // Return the calculation result
        return response()->json($calculation, 201);
    }

    public function history()
    {
        // Fetch the last 10 calculations from the database
        $calculations = Calculation::orderBy('created_at', 'desc')->take(10)->get();

        // Return the calculations
        return response()->json($calculations);
    }
}
