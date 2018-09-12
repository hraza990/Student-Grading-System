@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('message-status'))
                        <div class="alert alert-success">
                            {{ session('message-status') }}
                        </div>
                    @endif

                    <a type="button" class="btn btn-warning btn-lg" href="{{ route('add-class') }}">Classws</a>
                    <a type="button" class="btn btn-success btn-lg" href="{{ route('add-subject') }}">Subjects</a>
                    <a type="button" class="btn btn-primary btn-lg" href="{{ route('add-student') }}">Students</a>
                    <a type="button" class="btn btn-danger btn-lg" href="{{ route('add-grade') }}">Grades</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
