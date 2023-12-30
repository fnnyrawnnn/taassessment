@extends('main')

@section('title', 'Detail Grup Kompetensi')
@section('GrupKompetensi', 'active')

@section('content')
    <div class="content">
    <div class="card shadow mb-4">
                <div class="card-body">
                @include('competency__groups.show_fields')
                    <a href="/competencyGroups" class="btn btn-danger">Back</a>
                </div>
            </div>
    </div>
@endsection
