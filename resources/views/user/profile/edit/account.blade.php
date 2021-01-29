<div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
    <!-- users edit media object start -->
    <div class="media mb-2">
        <a class="mr-2 my-25" href="javascript:void(0)">
            @if ($user->image != null)
            <img src="{{ asset("storage/".$user->image) }}" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
            @else
            <img src="{{ asset('mawaisnow/svg/profile.svg') }}" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
            @endif

        </a>
        <div class="media-body mt-50">
            <h4 class="media-heading">{{ $user->name }}</h4>
            <div class="col-12 d-flex mt-1 px-0">
                <button onclick="$('#inputGroupFile01').click()" class="btn btn-primary d-none d-sm-block mr-75" type="button" name="button">Change</button>
                <button onclick="$('#inputGroupFile01').click()" class="btn btn-primary d-block d-sm-none mr-75" type="button" name="button"><i class="feather icon-edit-1"></i></button>
                {{-- <a href="" class="btn btn-primary d-none d-sm-block mr-75">Change</a>
                <a href="#" class="btn btn-primary d-block d-sm-none mr-75"></a> --}}
                {{-- <a href="#" class="btn btn-outline-danger d-none d-sm-block">Remove</a> --}}
                {{-- <a href="#" class="btn btn-outline-danger d-block d-sm-none"><i class="feather icon-trash-2"></i></a> --}}
            </div>
        </div>
    </div>

    <form method="post" enctype="multipart/form-data" action="{{ route('profileStore', $user->id) }}">
        @csrf
        <input type="hidden" name="tab" value="account">

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <div class="controls">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ pasteVal($user->name, 'name') }}" required>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <div class="controls">
                        <label>E-mail</label>
                        <input type="email" class="form-control " value="{{ $user->email }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <fieldset class="form-group">
                    <label for="basicInputFile">Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01"></label>
                    </div>
                </fieldset>
            </div>
            <div class="col-12 col-sm-6">
                <fieldset class="form-group">
                    <label for="basicInputFile">Cover</label>
                    <div class="custom-file">
                        <input type="file" name="cover" class="custom-file-input" id="inputGroupFile022">
                        <label class="custom-file-label" for="inputGroupFile022"></label>
                    </div>
                </fieldset>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" class="form-control" name="company" value="{{ pasteVal($profile->company, 'company') }}" placeholder="">
                </div>
            </div>

            @if (superAdmin())
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="9" @if($user->status == 9) selected @endif>Admin</option>
                        <option value="0" @if($user->status == 0) selected @endif>User</option>
                        <option value="2" @if($user->status == 2) selected @endif>Staff</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" @if($user->status == 1) selected @endif>Active</option>
                        <option value="2" @if($user->status == 2) selected @endif>Blocked</option>
                        <option value="3" @if($user->status == 3) selected @endif>deactivated</option>
                    </select>
                </div>
            </div>
            @endif

            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label class="form-control-label w-100" for="password">Password: </label>
                    <input class="form-control" type="password" id="password" name="password" autocomplete="new-password" value="">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label class="form-control-label w-100" for="password_confirm">Confirm Password: <span class="tx-danger">*</span> </label>
                    <input class="form-control" type="password" id="password_confirm" name="password_confirm" autocomplete="new-password" value="">
                </div>
            </div>



            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                    Changes</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
        </div>
    </form>
</div>
