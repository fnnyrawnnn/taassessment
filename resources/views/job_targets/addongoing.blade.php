@extends('main')

@section('title', 'Job Targets')

@section('JobTargets', 'active')

@section('content')
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="text-left">
               <a href="{{ url('jobTargets') }}" class="d-sm-inline text-decoration-none text-muted">
                    <i class="fas fa-chevron-left fa-lg" style="width: 20px"></i>
               </a>
               <h1 class="d-inline h3 text-gray-800">Add to Ongoing Job Target</h1>
          </div>
     </div>

     <div class="card shadow mb-4">
          <div class="card-body">
               {!! Form::model($jobTargets, ['route' => ['add.ongoing.job', $jobTargets->id], 'method' => 'patch']) !!}
               {!! Form::hidden('job_name', $jobTargets->job_name) !!}
               {!! Form::hidden('job_code', $jobTargets->job_code) !!}
               {!! Form::hidden('number_position', $jobTargets->number_position) !!}

               <!-- Assessment Session Id Field -->
               <h1 class="d-inline h3 text-gray-800" style="margin-bottom: 20px;">Add Session and Teams</h1>
               <div class="form-group">
               {!! Form::label('assessment_session_id', 'Assessment Session:') !!}
               {!! Form::select('assessment_session_id', $sessions, null, ['class' => 'form-control', 'placeholder' => '- Select Assessment Session -']) !!}
               </div>

               <div class="form-group">
               {!! Form::label('team_id', 'Team:') !!}
               {!! Form::select('team_id', $teams, null, ['class' => 'form-control', 'placeholder' => '- Select Team -']) !!}
               </div>

               <!-- Submit Field -->
               <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('jobTargets.index') }}" class="btn btn-default">Cancel</a>
               </div>

               {!! Form::close() !!}
          </div>
     </div>
@endsection