@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Create New Role")

@section("content")
    <div class="container-fluid py-4" id="create-agent-section">

    <div class="col-md-12 mb-4">
            <div class="p-4">
                <div class="card mt-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Create New Role</h6>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('roles.update', [$role]) }}" method="post" class="mt-4"  style="margin: 15px;">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Role</label>
                                    <input class="form-control" value="{{ $role->name }}" type="text" name="name" placeholder="Role">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Permission:</label><br/>
                                    @foreach($permission as $value)
                                        <input <?php if(in_array($value->id, $rolePermissions)) { echo 'checked'; } ?> type="checkbox" name="permission[]" value="{{ $value->id }}" > {{ $value->name }}
                                        <br/>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
