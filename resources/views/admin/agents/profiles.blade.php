@extends("admin.layouts.app", ['loadDataTable' => true])
@section("title", "Agents Profile")

@section("content")
    <div class="container-fluid py-4">

      <table id="agents" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Agent ID</th>
                <th>Name</th>
                <th>District</th>
                <th>Country</th>
                <th>Mobile Number</th>
                <th>Registered on</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>Agent ID</th>
                <th>Name</th>
                <th>District</th>
                <th>Country</th>
                <th>Mobile Number</th>
                <th>Registered on</th>
            </tr>
          </tfoot>
      </table>
    </div>
  @endsection

@section("js")

 <script type="text/javascript">
   $("#agents").DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route("admin.new_agent.get") }}",
          method: 'POST'
      },
      columns: [
        {data: 'id', name: 'admins.id'},
        {data: 'name', name: 'admins.name'},
        {data: 'district', name: 'admins.district'},
        {data: 'country', name: 'admins.country'},
        {data: 'mobile_number', name: 'admins.mobile_number'},
        {data: 'created_at', name: 'admins.created_at'}
      ]
  });
 </script>
@endsection
