<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;

class CalculationController extends Controller
{
    public function calculate(Request $request)
    {
        $input1 = $request->input('input1');
        $input2 = $request->input('input2');
        $operator = $request->input('operator');

        $result = 0;
        switch ($operator) {
            case '+':
                $result = $input1 + $input2;
                break;
            case '-':
                $result = $input1 - $input2;
                break;
            case '*':
                $result = $input1 * $input2;
                break;
            case '/':
                if ($input2 != 0) {
                    $result = $input1 / $input2;
                }
                break;
                case '%':
                    if ($input2 != 0) {
                        $result = $input1 % $input2;
                    }
                    break;
                case '^':
                    $result = pow($input1, $input2);
                    break;
        }

        $calculation = new Calculation;
        $calculation->user_id = auth()->id();
        $calculation->calculation = "$input1 $operator $input2 = $result";
        $calculation->save();

        return response()->json(['result' => $result]);
    }

    public function history()
    {
        $calculations = Calculation::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        return response()->json(['history' => $calculations]);
    }
}
