@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Class</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'save-grade', 'files' => true]) }}
                      
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                      </div>

                      <div class="form-group">
                        <label for="condition">Condition</label>
                        <input name="condition" type="text" class="form-control" id="condition">
                      </div>

                      <div class="form-group">
                        <label for="percentage">Percentage</label>
                        <input name="percentage" type="text" class="form-control" id="percentage">
                      </div>

                      <div class="form-group">
                        <label for="comment">Description:</label>
                        <textarea name="desc" class="form-control" rows="3" id="comment"></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-default">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>

        <table id="myTable" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>ID#</th>
                  <th>Name</th>
                  <th>Condition</th>
                  <th>Percentage</th>
                  <th>Desc</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($grades as $grade)
                <tr>
                  <td>{{ $grade->id }}</td>
                  <td>{{ $grade->name }}</td>
                  <td>{{ $grade->condition }}</td>
                  <td>{{ $grade->percentage }}</td>
                  <td>{{ $grade->desc }}</td>
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
