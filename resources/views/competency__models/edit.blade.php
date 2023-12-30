@extends('main')

@section('title', 'Edit Model Kompetensi')
@section('ModelKompetensi', 'active')
@section('content')
<section class="content-header">
    <h4>
        Edit Model Kompetensi
    </h4>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-success">
        <div class="card shadow mb-4">
            <div class="card-body">
                {!! Form::model($competencyModel, ['route' => ['competencyModels.update', $competencyModel->id], 'method' => 'patch']) !!}

                @include('competency__models.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({
            placeholder: "Pilih Kompetensi",
            closeOnSelect: false
        });
    });
</script>
@endsection