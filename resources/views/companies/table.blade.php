<div class="table-responsive">
    <table class="table" id="companies-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Telp</th>
                <th>Fax</th>
                <th>Email</th>
                <th>Contact Person</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->telp }}</td>
                <td>{{ $company->fax }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->contact_person }}</td>
                <td>{{ $company->description }}</td>
                <td>
                    {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('companies.show', [$company->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('companies.edit', [$company->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>