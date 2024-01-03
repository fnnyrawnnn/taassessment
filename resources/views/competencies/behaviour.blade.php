<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Level</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($behaviour as $data)
            <tr>
                <td>{{ $data->level }}</td>
                <td>{{ $data->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>