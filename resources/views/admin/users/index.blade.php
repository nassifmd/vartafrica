@extends("admin.layouts.app", ['loadDataTable' => true])
@section("title", "Users")

@section("content")
    <div class="container-fluid py-4">
      
      <table id="users" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <!-- <th>Email</th> -->
                <th>Balance</th>
                <th>Location</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <!-- <th>Email</th> -->
                <th>Balance</th>
                <th>Location</th>
                <th>Created at</th>
            </tr>
          </tfoot>
      </table>
    </div>
  @endsection
  
@section("js")

 <script type="text/javascript">
   $("#users").DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route("admin.users.get") }}",
          method: 'POST'
      },
      columns: [{data: 'id', name: 'users.id'},
                {data: 'name', name: 'users.name'},
                {data: 'username', name: 'users.username'},
                // {data: 'email', name: 'users.email'},
                {data: 'balance', name: 'users.balance'},
                {data: 'location', name: 'users.location'},
                {data: 'created_at', name: 'users.created_at'}]
  });
 </script>
@endsection