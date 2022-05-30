@extends("admin.layouts.app", ['loadDataTable' => true])
@section("title", "Farmers Profile")

@section("content")
    <div class="container-fluid py-4">

      <table id="farmers" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Farmer ID</th>
                <th>Name</th>
                <th>Sex</th>
                <th>Mobile Number</th>
                <th>District</th>
                <th>Country</th>
                <th>Registered on</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>Farmer ID</th>
                <th>Name</th>
                <th>Sex</th>
                <th>Mobile Number</th>
                <th>District</th>
                <th>Country</th>
                <th>Registered on</th>
            </tr>
          </tfoot>
      </table>
    </div>
  @endsection

@section("js")

 <script type="text/javascript">
   $("#farmers").DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route("admin.new_farmer.get") }}",
          method: 'POST'
      },
      columns: [{data: 'id', name: 'users.id'},
                {data: 'name', name: 'users.name'},
                {data: 'sex', name: 'users.sex'},
                {data: 'contact', name: 'users.contact'},
                {data: 'district', name: 'users.district'},
                {data: 'country', name: 'users.country'},
                {data: 'created_at', name: 'users.created_at'}]
  });
 </script>
@endsection
