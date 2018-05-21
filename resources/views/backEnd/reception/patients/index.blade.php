@extends('backLayout.app')
@section('title')
Patient
@stop

@section('content')

    <h1>Patients <a href="{{ url('reception/patients/create') }}" class="btn btn-primary pull-right btn-sm">Add New Patient</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped {{ count($patients) > 0 ? 'datatable' : '' }} dt-select">
        {{-- <table class="table table-bordered table-striped table-hover" id="tblreception/patients"> --}}
            <thead>
                <tr>
                    <th>ID</th><th>Reg No</th><th>First Name</th><th>Last Name</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($patients as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('reception/patients', $item->id) }}">{{ $item->reg_no }}</a></td><td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td>
                    <td>
                        <a href="{{ url('reception/patients/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['reception/patients', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection


@section('scripts')

@endsection