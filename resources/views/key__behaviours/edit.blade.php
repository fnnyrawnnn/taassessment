@extends('main')

@section('title', 'Edit Key Behaviour')
@section('kompetensi', 'active')
@section('content')
<section class="content-header">

    <h4>
        Edit Key Behaviour <br>
    </h4>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-success">
        <div class="card shadow mb-4">
            <div class="card-body">
                {!! Form::model($keyBehaviour, ['route' => ['keyBehaviours.update', $keyBehaviour->id], 'method' => 'patch']) !!}

                @include('key__behaviours.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection