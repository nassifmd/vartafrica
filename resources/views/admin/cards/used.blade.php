@extends("admin.layouts.app", ['loadDataTable' => true])
@section("title", "Used Cards")

@section("content")
    <div class="container-fluid py-4">

      <table id="used-cards" class="display" style="width:100%">
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
   $("#used-cards").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route("admin.cards.get_used") }}",
            method: 'POST'
        },
        columns: [{data: 'id', name: 'cards.id'},
                  {data: 'amount', name: 'cards.amount'},
                  {data: 'total_active_cards', name: 'cards.total_active_cards'},
                  {data: 'created_at', name: 'cards.created_at'}]
    });
 </script>
@endsection
