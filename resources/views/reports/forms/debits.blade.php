<div class="col-md-12 mb-4">
              <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Debits Report</h6>
                    </div>
                  </div>
                </div>
                <div class="mt-4"  style="margin: 15px;">
          <form class="row" target="_blank" method="POST" action="{{ route("user.reports.debits") }}">
            {!! csrf_field() !!}

            <div class="col-md-6">
              <div class="form-group">
                 <div class="form-check">
                  <input @change="initiateDatePicker('debits')" class="form-check-input" type="checkbox" name="custom_dates" v-model="debits.custom_dates" id="debits-check-custom-dates">
                  <label class="custom-control-label" for="debits-check-custom-dates">Custom dates</label>
                </div>
              </div>
            </div>
            <div class="col-md-6" v-if="debits.custom_dates">
              <div class="form-group">
                  <label class="form-control-label">Select dates</label>
                  <input class="form-control" name="selected_dates" type="text" id="debits-dates" placeholder="Date">
            </div>
           </div>
           
            <div class="col-md-6">

              <div class="form-group">
                <label class="form-control-label">Amount</label>
                <select name="amount_type" class="form-control" v-model="debits.amount" placeholder="Amount">
                  <option value="all" selected="">All</option>
                  <option value="custom">Custom</option>
                  
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="debits.amount == 'custom'">
              <div class="form-group">
                  <label class="form-control-label">Operator</label>
                <select name="amount_operator" class="form-control" v-model="debits.custom_amount_operator" placeholder="Operator">
                  <option value="=" selected>=</option>
                  <option value="!=">!=</option>
                  <option value=">">></option>
                  <option value=">=">>=</option>
                  <option value="<"><</option>
                  <option value="<="><=</option>
                </select>
              </div>
            </div>
            <div class="col-md-6" v-if="debits.amount == 'custom'">
              <div class="form-group">
                  <label class="form-control-label">Amount Value</label>
                  <input name="amount_value" class="form-control" type="number" v-model="debits.custom_amount" placeholder="Custom amount">
                </div>
              </div>
            <div class="clearfix"></div>

            <div class="col-md-6" v-if="debits.amount == 'all' || (debits.amount == 'custom' && debits.custom_amount)">
                <button class="btn btn-primary" type="submit">Generate Report</button>
            </div>
          </form>
              </div>
            </div>
            </div>
      </div>
