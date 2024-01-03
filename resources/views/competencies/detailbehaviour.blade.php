@extends('main')

@section('title', 'Detail Kompetensi')
@section('kompetensi', 'active')
@section('content')
<div class="content">
     <div class="card shadow mb-4">
          <div style="margin:20px 0px 0px 20px;">
               <h3> <b>Pertanyaan Assessment </b></h3>
               <p style="margin-left: 8px;">{{ $competency->question }}</p>
               <h4 style="margin-top: 40px;">
                    {{-- <img src="https://www.materialui.co/materialIcons/communication/vpn_key_black_192x192.png" width="24" height="24" class="d-inline-block align-top" class="user-image" alt="User Image" /> --}}
                    <span class="hidden-xs"><b>Key Behaviour dari Kompetensi {{ $competency->name }} ({{ $competency->code }})</b></span>
               </h4>
          </div>
          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                              <tr>
                                   <th>Level</th>
                                   <th>Deskripsi</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($behaviour as $data)
                              <tr>
                                   <td>{{ $data->level }}</td>
                                   <td>{{ $data->description }}</td>
                                   <td>
                                        {!! Form::open(['route' => ['keyBehaviours.destroy', $data->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                             <a href="{{ route('keyBehaviours.edit', [$data->id]) }}" class='btn btn-warning'><span class="iconify" data-icon="bx:bx-edit" data-inline="false"></span></a>
                                             {!! Form::button('<span class="iconify" data-icon="bi:trash" data-inline="false"></span>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                   </td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
                    {{-- <a style="margin-left: 5px" href="{{ route('keyBehaviours.create') }}">Tambah Key Behaviour</a> --}}
               </div>
               <a href="{{ route('keyBehaviours.create') }}" class="btn btn-primary">Tambah Key Behaviour</a>
               <a href="{{ route('competencies.index') }}" class="btn btn-danger">Back</a>
          </div>

     </div>
</div>
@endsection