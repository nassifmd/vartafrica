@extends("admin.layouts.app", ['loadDataTable' => true])
@section("title", "Active Cards")

@section("content")
    <div class="container-fluid py-4">

      <table id="active-cards" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Number of Active Cards</th>
                <th>Created on</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Number of Active Cards</th>
                <th>Created on</th>
            </tr>
        </tfoot>
      </table>
    </div>
  @endsection

@section("js")

 <script type="text/javascript">
   $("#active-cards").DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route("admin.cards.get_active") }}",
          method: 'POST'
      },
      columns: [{data: 'id', name: 'cards.id'},
                {data: 'amount', name: 'cards.amount'},
                {data: 'total_active_cards', name: 'cards.total_active_cards'},
                {data: 'created_at', name: 'cards.created_at'}]
  });
  function deleteCard (id, serial, amount) {
      if(confirm("Do you want to remove this card.\nSerial: "+ serial + "\nAmount: "+amount))
      {
          $.ajax({
                url: "{{ route("admin.cards.delete") }}"+'/'+id+"/"+serial,
                type: 'delete',
                success: function(data) {
                   if (data.success == false)
                       return alert(data.message);
                    alert(data.message);
                    $("#active-cards").DataTable().draw(true);
                }
          });
      }
   }
 </script>
@endsection
