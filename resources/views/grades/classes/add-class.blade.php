@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Class</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'save-class', 'files' => true]) }}
                      
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                      </div>

                      <div class="form-group">
                        <label for="comment">Description:</label>
                        <textarea name="desc" class="form-control" rows="5" id="comment"></textarea>
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
                  <th>Desc</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($classes as $class)
                <tr>
                  <td>{{ $class->name }}</td>
                  <td>{{ $class->desc }}</td>
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
