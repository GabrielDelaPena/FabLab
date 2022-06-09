<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class RechargeController extends Controller
{

    public function index()
    {
        return view('others.recharge');
    }

    public function store(Request $request)
    {
        $student = Student::findOrFail($request->input('id'));
        $teBetalen = $request->input('waarde');
        if ($student === false) {
            return redirect()->route('error');
        }

        if ($teBetalen <= 0) {
            return redirect()->route('recharge.index')->with('waarOnerNull', 'Waarde mag niet gelijk of onder 0 zijn.');
        }

        // $student->balance = $student->balance + $request->input('waarde');

        // $student->save();

        return redirect()->route('createTransaction')->with('betaling', ['teBetalen' => $teBetalen, 'studentId' => $request->input('id')]);
    }

    // public function successPaid() {
    //     $student = Student::findOrFail(session('betaling')['studentId']);

    //     $student->balance = $student->balance + session('betaling')['teBetalen'];

    //     $student->save();

    //     return redirect()->route('recharge.index')->with('studentSucces', 'Student is rijker');

    // }
}
