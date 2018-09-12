@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Student</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'save-student', 'files' => true]) }}
                      
                      <div class="form-group">
                        {{ Form::label('class', 'Select Class:', array('class' => 'control-label')) }}
                        {{ Form::select('class', $classesList, old('class'), ['class' => 'form-control', 'placeholder' => 'Select Students\'s Class', 'required']) }}
                      </div>

                      <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                      </div>

                      <div class="form-group">
                        <label for="email">Email address:</label>
                        <input name="email" type="email" class="form-control" id="email">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input name="password" type="password" class="form-control" id="pwd">
                      </div>
                      
                      <button type="submit" class="btn btn-default">Submit</button>
                    {{ Form::close() }}

                </div>
            </div>
        </div>

        <table id="myTable" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>Class</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($students as $student)
                <tr>
                  <td>{{ $student->studentClass->name }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->email }}</td>
                  <td>
                    <a href="{{route('view-student', $student->id)}}" type="button" class="btn btn-primary btn-xs">View</a>
                    <a href="#" type="button" class="btn btn-warning btn-xs">Edit</a>
                    <a href="#" type="button" class="btn btn-danger btn-xs">Delete</a>
                  </td>
                </tr>
              @empty
                  <h1>No Data</h1>
              @endforelse
          </tbody>
        </table>
    </div>
</div>
@endsection
