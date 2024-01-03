@extends('main')

@section('title', 'Detail Model Kompetensi')
@section('ModelKompetensi', 'active')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <br>
        <h3 class="block-title">Detail Model Kompetensi / {{ $competencyModel->name }}</h3>

        <p>{{ $competencyModel->description }}.</p>
        <br>
        <h5><b>Daftar Kompetensi</b></h5>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($competencyModel->competencies as $competency)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{!! $competency->code !!}</td>
                        <td>{!! $competency->name !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
    <a href="{{ route('competencyModels.index') }}" class="btn btn-danger">Back</a>
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

<!-- Page level plugins -->
<script src="{{ asset('style/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('style/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('style/js/demo/datatables-demo.js') }}"></script>

@endsection