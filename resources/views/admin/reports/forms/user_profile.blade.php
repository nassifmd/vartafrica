<div class="col-md-12 mb-4">
              <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">User Profile Report</h6>
                    </div>
                  </div>
                </div>
                <div class="mt-4"  style="margin: 15px;">
          <form class="row" target="_blank" method="POST" action="{{ route("admin.reports.cards.generate_user_profile") }}">
            {!! csrf_field() !!}
           <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">User</label>
                <select name="user_id" class="form-control user_profile-users-list" v-model="user_profile.user_id" placeholder="Select user">
                    <option value="all" selected="">All</option>
                    <option v-for="user in users" v-bind:value="user.id">@{{ user.name +" ($"+user.balance+")"  }}</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">

              <div class="form-group">
                <label class="form-control-label">Balance</label>
                <select name="amount_type" class="form-control" v-model="user_profile.amount" placeholder="Amount">
                  <option value="all" selected="">All</option>
                  <option value="custom">Custom</option>
                  
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="user_profile.amount == 'custom'">
              <div class="form-group">
                  <label class="form-control-label">Operator</label>
                <select name="amount_operator" class="form-control" v-model="user_profile.custom_amount_operator" placeholder="Operator">
                  <option value="=" selected>=</option>
                  <option value="!=">!=</option>
                  <option value=">">></option>
                  <option value=">=">>=</option>
                  <option value="<"><</option>
                  <option value="<="><=</option>
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="user_profile.amount == 'custom'">
              <div class="form-group">
                  <label class="form-control-label">Balance Value</label>
                  <input name="amount_value" class="form-control" type="number" v-model="user_profile.custom_amount" placeholder="Balance amount">
                </div>
              </div>

             <div class="col-md-6">

              <div class="form-group">
                <label class="form-control-label">Order by</label>
                <select name="order_by" class="form-control" v-model="user_profile.order_column" placeholder="Order by">
                  <option value="balance" selected="">Balance</option>
                  <option value="debits">Debits</option>
                </select>
              </div>
            </div>

             <div class="col-md-6">

              <div class="form-group">
                <label class="form-control-label">Order type</label>
                <select name="order_type" class="form-control" v-model="user_profile.order_type" placeholder="Order type">
                  <option value="ASC" selected="">ASC</option>
                  <option value="DESC">DESC</option>
                </select>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-6" v-if="user_profile.amount == 'all' || (user_profile.amount == 'custom' && user_profile.custom_amount)">
                <button class="btn btn-primary" type="submit">Generate Report</button>
            </div>
            
          </form>
              </div>
            </div>
            </div>
      </div>
