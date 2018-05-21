@extends('backLayout.app')
@section('title')
Patient
@stop

@section('content')

    <div class = "row">
    <h1>Patient Details</h1>
    <a href="{{ url('reception/patients/create') }}" class="btn btn-primary pull-right btn-sm">Add to waiting queue</a>
    <a href="{{ url('reception/patients/create') }}" class="btn btn-primary pull-right btn-sm">Generate Invoice</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-condensed table-user-information">
            <thead>
                <tr>
                    <th>ID.</th> <th>Reg No</th><th>First Name</th><th>Last Name</th><th>Other Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $patient->id }}</td> <td> {{ $patient->reg_no }} </td><td> {{ $patient->first_name }} </td><td> {{ $patient->last_name }} </td><td> {{ $patient->other_name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection