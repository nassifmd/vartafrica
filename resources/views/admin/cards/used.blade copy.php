@extends("admin.layouts.app", ['loadDataTable' => true])
@section("title", "Used Cards")

@section("content")
    <div class="container-fluid py-4">
      
      <table id="used-cards" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Serial</th>
                <th>Amount</th>
                <th>Used by</th>
                <th>Used at</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Serial</th>
                <th>Amount</th>
                <th>Used by</th>
                <th>Used at</th>
            </tr>
          </tfoot>
      </table>
    </div>
  @endsection
  
@section("js")

 <script type="text/javascript">
   $("#used-cards").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route("admin.cards.get_used") }}",
            method: 'POST'
        },
        columns: [{data: 'id', name: 'cards.id'},
                  {data: 'serial', name: 'cards.serial'},
                  {data: 'amount', name: 'cards.amount'},
                  {data: 'used_by', name: 'users.name'},
                  {data: 'used_at', name: 'cards.created_at'}]
    });
 </script>
@endsection