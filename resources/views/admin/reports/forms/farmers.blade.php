<div class="col-md-12 mb-4">
    <div class="p-4">
        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Farmers Report</h6>
                </div>
                </div>
            </div>
            <div class="mt-4"  style="margin: 15px;">
                <form class="row" target="_blank" method="POST" action="{{ route("admin.reports.cards.generate_farmer") }}">
                    {!! csrf_field() !!}
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="form-control-label">Farmers</label>
                        <select name="farmer_id" class="form-control" placeholder="Select Farmer">
                            <option value="all" selected="">All</option>
                            <option v-for="user in users" v-bind:value="user.id">@{{ user.name }}</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Order type</label>
                            <select name="order_type" class="form-control" v-model="user_balance.order_type" placeholder="Order type">
                                <option value="ASC" selected="">ASC</option>
                                <option value="DESC">DESC</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit" name="excel">Generate Excel Report</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit" name="pdf">Generate PDF Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
