@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary btn-lg">Add Student</button>
                    <button type="button" class="btn btn-success btn-lg">Add Subject</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
