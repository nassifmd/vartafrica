<div class="col-md-12 mb-4">
    <div class="p-4">
        <div class="card mt-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Deductions</h6>
                </div>
                </div>
            </div>
            <div class="mt-4"  style="margin: 15px;">
                <form class="row" target="_blank" method="POST" action="{{ route("admin.reports.cards.generate_deductions") }}">
                    {!! csrf_field() !!}
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="form-control-label">Agents</label>
                        <select name="agent_id" class="form-control" placeholder="Select Agent">
                            <option value="all" selected="">All</option>
                            <option v-for="agent in agents" v-bind:value="agent.id">@{{ agent.name }}</option>
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
                        <button class="btn btn-primary" type="submit">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
