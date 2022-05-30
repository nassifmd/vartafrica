@extends("admin.layouts.app", ['loadDataTable' => true, 'loadVUE' => true, 'loadAxios' => true])
@section("title", "User Debits")

@section("content")
    <div class="container-fluid py-4">
      
      <table id="user-debits" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Farmer ID</th>
                <th>Amount</th>
                <th>Farmer Name</th>
                <th>Debited on</th>
                <th>Debited by</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>Farmer ID</th>
                <th>Amount</th>
                <th>Farmer Name</th>
                <th>Debited on</th>
                <th>Debited by</th>
            </tr>
          </tfoot>
      </table>
    </div>
  @endsection
  
@section("js")

 <script type="text/javascript">
   $("#user-debits").DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route("admin.user_debits.get") }}",
          method: 'POST'
      },
      columns: [{data: 'id', name: 'user_debits.id'},
                {data: 'amount', name: 'user_debits.amount'},
                {data: 'username', name: 'users.name'},
                {data: 'created_at', name: 'user_debits.created_at'},
                {data: 'created_by', name: 'admins.name'}]
  });
 </script>
@endsection