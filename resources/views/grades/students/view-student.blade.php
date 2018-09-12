@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Student Details</div>

                <div class="panel-body">
                    {{ Form::open(['route' => 'save-student-marks', 'files' => true]) }}
                        
                        {{ Form::hidden('student_id', $student->id) }}

                        <h2>{{ $student->name }} <small>of {{ $student->studentClass->name }}</small></h2>
                        <table class="rwd-table">
                          <tr>
                            <th>Subject</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                            <th>Percentage</th>
                            <th>Grade</th>
                          </tr>
                            @forelse ($student->studentClass->ClassSubjects as $subject)
                                
                                {{ Form::hidden('subjects['.$subject->id.'][subject_id]', $subject->id != null ? $subject->id : 0) }}

                                {{ Form::hidden('subjects['.$subject->id.'][subject_total_marks]', $subject->total_marks != null ? $subject->total_marks : 0) }}
                              <tr>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->total_marks }}</td>
                                <td>
                                    <div class="form-group">
                                        <input name="subjects[{{$subject->id}}][subject_obtain_marks]" value="{{isset($subject->subjectMarks[0]) ? $subject->subjectMarks[0]->obtain_marks : ''}}" type="text" class="form-control" style="max-width:50px;background: #34495E;color:#fff;">
                                    </div>
                                </td>
                                <td>{{ isset($subject->subjectMarks[0]) ? $subject->subjectMarks[0]->percentage : '--'}}</td>
                                <td>{{ isset($subject->subjectMarks[0]) ? $subject->subjectMarks[0]->grade : '--'}}</td>
                              </tr>
                            @empty
                                <h1>No Data</h1>
                            @endforelse
                        </table>

                    <button type="submit" class="btn btn-default">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
