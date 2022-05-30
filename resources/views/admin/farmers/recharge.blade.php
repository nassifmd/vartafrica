@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Recharge Farmer")

@section("content")
    <div class="container-fluid py-4" id="recharge-farmer-section">

        <div class="col-md-12 mb-4">
            <div class="p-4">

                <div class="card mt-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Recharge Farmer</h6>
                            </div>
                        </div>
                        @if($message = Session::get('msg'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-success">
                                @foreach ($errors->all() as $error)
                                    <p style="color: #fff;">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('admin.new_farmer.recharge') }}" class="mt-4"  style="margin: 15px;">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Select Farmer</label>
                                    <select required name="farmers" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($farmers as $farmer)
                                            <option value="{{ $farmer->id }}">{{ $farmer->contact}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Enter Serial Number</label>
                                    <input required id="serial_number" class="form-control" placeholder="Enter Serial Number Without Dashes" type="text" name="serial_number" v-model="serial_number" value="{{ old('serial_number') }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>

                            <div class="clearfix"></div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
