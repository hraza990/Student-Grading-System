@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Subject</div>

                <div class="panel-body">

                    {{ Form::open(['route' => 'save-subject', 'files' => true]) }}
                      
                      <div class="form-group">
                        {{ Form::label('class', 'Select Class:', array('class' => 'control-label')) }}
                        {{ Form::select('class', $classesList, old('class'), ['class' => 'form-control', 'placeholder' => 'Select Students\'s Class', 'required']) }}
                      </div>

                      <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                      </div>

                      <div class="form-group">
                        <label for="total_marks">Total Marks</label>
                        <input name="total_marks" type="text" class="form-control" id="total_marks">
                      </div>
                      
                      <button type="submit" class="btn btn-default">Submit</button>
                    {{ Form::close() }}

                </div>
            </div>
        </div>

        <table id="myTable" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Class</th>
                  <th>Total Marks</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($subjects as $subject)
                <tr>
                  <td>{{ $subject->name }}</td>
                  <td>{{ $subject->subjectClass->name }}</td>
                  <td>{{ $subject->total_marks }}</td>
                  <td>
                    <a href="#" type="button" class="btn btn-primary btn-xs">View</a>
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
