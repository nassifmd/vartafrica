@extends("admin.layouts.app", ['loadDataTable' => true])
@section("title", "Admins Profile")

@section("content")
    <div class="container-fluid py-4">

      <table id="admins" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Contact Person's Name</th>
                <th>Country</th>
                <th>Mobile Number</th>
                <th>Registered on</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Contact Person's Name</th>
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
   $("#admins").DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route("admin.new_admin.get") }}",
          method: 'POST'
      },
      columns: [{data: 'id', name: 'admins.id'},
                {data: 'name', name: 'admins.name'},
                {data: 'company', name: 'admins.company'},
                {data: 'contact_person', name: 'admins.contact_person'},
                {data: 'country', name: 'admins.country'},
                {data: 'mobile_number', name: 'admins.mobile_number'},
                {data: 'created_at', name: 'admins.created_at'}]
  });
 </script>
@endsection
