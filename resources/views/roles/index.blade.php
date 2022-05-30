@extends("admin.layouts.app", ['loadDataTable' => true, 'loadVUE' => true, 'loadAxios' => true])
@section("title", "User Debits")

@section("content")
    <div class="container-fluid py-4" id="roles-section">
        <a href="{{ route('roles.create') }}" data-original-title="Edit" class="btn btn-primary">
            Create Role
        </a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table id="roles" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('roles.edit', [$role]) }}" data-original-title="Edit" class="btn btn-success">
                            Edit
                        </a>
                        <a href="{{ route('roles.destroy', [$role]) }}" onclick="return confirm('Are you sure?')" data-original-title="Delete" class="btn btn-danger">
                        Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
  @endsection

@section("js")

 <script type="text/javascript">
    $("#roles").DataTable({});
 </script>
@endsection
