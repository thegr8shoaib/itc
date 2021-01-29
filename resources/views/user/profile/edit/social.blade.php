<div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
    <!-- users edit socail form start -->
    <form method="post" action="{{ route('profileStore', $user->id) }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="tab" value="social">

        <div class="row">
            <div class="col-12 col-sm-6">

                <fieldset>
                    <label>Twitter</label>
                    <div class="input-group mb-75">
                        <div class="input-group-prepend">
                            <span class="input-group-text feather icon-twitter" id="basic-addon3"></span>
                        </div>
                        <input type="text" class="form-control" name="twitter" value="{{ pasteVal($profile->twitter, 'twitter') }}">
                    </div>
                    <label>Linkdin</label>
                    <div class="input-group mb-75">
                        <div class="input-group-prepend">
                            <span class="input-group-text feather icon-linkedin" id="basic-addon111"></span>
                        </div>
                        <input type="text" class="form-control" name="linkdin" value="{{ pasteVal($profile->linkdin, 'linkdin') }}">
                    </div>

                    <label>Facebook</label>
                    <div class="input-group mb-75">
                        <div class="input-group-prepend">
                            <span class="input-group-text feather icon-facebook" id="basic-addon4"></span>
                        </div>
                        <input type="text" class="form-control"  name="facebook" value="{{ pasteVal($profile->facebook, 'facebook') }}">
                    </div>
                    <label>Instagram</label>
                    <div class="input-group mb-75">
                        <div class="input-group-prepend">
                            <span class="input-group-text feather icon-instagram" id="basic-addon5"></span>
                        </div>
                        <input type="text" class="form-control"  name="instagram" value="{{ pasteVal($profile->instagram, 'instagram') }}">
                    </div>
                </fieldset>
            </div>
            <div class="col-12 col-sm-6">
                <label>Github</label>
                <div class="input-group mb-75">
                    <div class="input-group-prepend">
                        <span class="input-group-text feather icon-github" id="basic-addon9"></span>
                    </div>
                    <input type="text" class="form-control"  name="github" value="{{ pasteVal($profile->github, 'github') }}">
                </div>
                <label>Codepen</label>
                <div class="input-group mb-75">
                    <div class="input-group-prepend">
                        <span class="input-group-text feather icon-codepen" id="basic-addon12"></span>
                    </div>
                    <input type="text" class="form-control"  name="codepen" value="{{ pasteVal($profile->codepen, 'codepen') }}">
                </div>
                <label>Slack</label>
                <div class="input-group mb-75">
                    <div class="input-group-prepend">
                        <span class="input-group-text feather icon-slack" id="basic-addon11"></span>
                    </div>
                    <input type="text" class="form-control" name="slack" value="{{ pasteVal($profile->slack, 'slack') }}">
                </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                    Changes</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
        </div>
    </form>
    <!-- users edit socail form ends -->
</div>
