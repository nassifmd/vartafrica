<div class="col-md-12 mb-4">
              <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-it`em`s-center">
                      <h6 class="mb-0">Active Cards Report</h6>
                    </div>
                  </div>
                </div>
                <div class="mt-4"  style="margin: 15px;">
          <form class="row" target="_blank" method="POST" action="{{ route("admin.reports.cards.generate_active") }}">
            {!! csrf_field() !!}
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Created by</label>
                <select name="created_by" class="form-control active-cards-admin-list" v-model="cards.active.created_by" placeholder="Created by">
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
                  <input @change="initiateDatePicker('active')" class="form-check-input" type="checkbox" name="custom_dates" v-model="cards.active.custom_dates" id="active-check-custom-dates">
                  <label class="custom-control-label" for="active-check-custom-dates">Custom dates</label>
                </div>
              </div>
            </div>
            <div class="col-md-6" v-if="cards.active.custom_dates">
              <div class="form-group">
                  <label class="form-control-label">Select dates</label>
                  <input class="form-control" name="selected_dates" type="text" id="active-dates" placeholder="Date">
            </div>
           </div>

            <div class="col-md-6">

              <div class="form-group">
                <label class="form-control-label">Amount</label>
                <select name="amount_type" class="form-control" v-model="cards.active.amount" placeholder="Amount">
                  <option value="all" selected="">All</option>
                  <option value="custom">Custom</option>

                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="cards.active.amount == 'custom'">
              <div class="form-group">
                  <label class="form-control-label">Operator</label>
                <select name="amount_operator" class="form-control" v-model="cards.active.custom_amount_operator" placeholder="Operator">
                  <option value="=" selected>=</option>
                  <option value="!=">!=</option>
                  <option value=">">></option>
                  <option value=">=">>=</option>
                  <option value="<"><</option>
                  <option value="<="><=</option>
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="cards.active.amount == 'custom'">
              <div class="form-group">
                  <label class="form-control-label">Amount Value</label>
                  <input name="amount_value" class="form-control" type="number" v-model="cards.active.custom_amount" placeholder="Custom amount">
                </div>
              </div>
            <div class="clearfix"></div>

            <div class="col-md-6" v-if="cards.active.amount == 'all' || (cards.active.amount == 'custom' && cards.active.custom_amount)">
                <button class="btn btn-primary" type="submit" name="excel">Generate Excel Report</button>
            </div>
            <div class="col-md-6" v-if="cards.active.amount == 'all' || (cards.active.amount == 'custom' && cards.active.custom_amount)">
                <button class="btn btn-primary" type="submit" name="pdf">Generate PDF Report</button>
            </div>
          </form>
              </div>
            </div>
            </div>
      </div>
