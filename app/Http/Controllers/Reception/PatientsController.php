<?php

namespace App\Http\Controllers\Reception;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PatientsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patients = Patient::all();

        return view('backEnd.reception.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.reception.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['reg_no' => 'required', 'first_name' => 'required', 'last_name' => 'required', ]);

        $patient = Patient::create($request->all());

        Session::flash('message', 'Patient added!');
        Session::flash('status', 'success');

        return view('backEnd.reception.patients.show')->withPatient($patient);
        // return redirect('reception/patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('backEnd.reception.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);

        return view('backEnd.reception.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['reg_no' => 'required', 'first_name' => 'required', 'last_name' => 'required', ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        Session::flash('message', 'Patient updated!');
        Session::flash('status', 'success');

        return redirect('reception/patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        Session::flash('message', 'Patient deleted!');
        Session::flash('status', 'success');

        return redirect('reception/patients');
    }

}
