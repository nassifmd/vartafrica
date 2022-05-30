<div class="col-md-12 mb-4">
              <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Used Cards Report</h6>
                    </div>
                  </div>
                </div>
                <div class="mt-4"  style="margin: 15px;">
          <form class="row" target="_blank" method="POST" action="{{ route("admin.reports.cards.generate_used") }}">
            {!! csrf_field() !!}
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Created by</label>
                <select name="created_by" class="form-control used-cards-admin-list" v-model="cards.used.created_by" placeholder="Created by">
                  <option value="all" selected="">All</option>
                  @foreach($admins as $admin)
                  <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                 <div class="form-check">
                  <input @change="initiateDatePicker('used')" class="form-check-input" type="checkbox" name="custom_dates" v-model="cards.used.custom_dates" id="used-check-custom-dates">
                  <label class="custom-control-label" for="used-check-custom-dates">Custom dates</label>
                </div>
              </div>
            </div>
            <div class="col-md-6" v-if="cards.used.custom_dates">
              <div class="form-group">
                  <label class="form-control-label">Select dates</label>
                  <input class="form-control" name="selected_dates" type="text" id="used-dates" placeholder="Date">
            </div>
           </div>

           <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">User</label>
                <select name="user_id" class="form-control used-cards-users-list" v-model="cards.used.user_id" placeholder="Select user">
                    <option value="all" selected="">All</option>
                    <option v-for="user in users" v-bind:value="user.id">@{{ user.name +" ($"+user.balance+")" }}</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">

              <div class="form-group">
                <label class="form-control-label">Amount</label>
                <select name="amount_type" class="form-control" v-model="cards.used.amount" placeholder="Amount">
                  <option value="all" selected="">All</option>
                  <option value="custom">Custom</option>

                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="cards.used.amount == 'custom'">
              <div class="form-group">
                  <label class="form-control-label">Operator</label>
                <select name="amount_operator" class="form-control" v-model="cards.used.custom_amount_operator" placeholder="Operator">
                  <option value="=" selected>=</option>
                  <option value="!=">!=</option>
                  <option value=">">></option>
                  <option value=">=">>=</option>
                  <option value="<"><</option>
                  <option value="<="><=</option>
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="cards.used.amount == 'custom'">
              <div class="form-group">
                  <label class="form-control-label">Amount Value</label>
                  <input name="amount_value" class="form-control" type="number" v-model="cards.used.custom_amount" placeholder="Custom amount">
                </div>
              </div>
            <div class="clearfix"></div>

            <div class="col-md-6" v-if="cards.used.amount == 'all' || (cards.used.amount == 'custom' && cards.used.custom_amount)">
                <button class="btn btn-primary" type="submit">Generate Report</button>
            </div>
          </form>
              </div>
            </div>
            </div>
      </div>
