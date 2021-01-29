<div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
    <!-- users edit Info form start -->
    <form method="post" enctype="multipart/form-data" action="{{ route('profileStore', $user->id) }}">
        @csrf
        <input type="hidden" name="tab" value="information">

        <div class="row mt-1">
            <div class="col-12">
                <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Personal Information</h5>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <div class="controls">
                        <label>Birth date</label>
                        <input type="text" name="dob" class="form-control birthdate" value="{{ pasteVal($profile->dob, 'dob') }}">
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="{{ pasteVal($profile->mobile, 'mobile') }}" placeholder="">
                </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group">
                  <div class="controls">
                      <label>Website</label>
                      <input type="text" class="form-control" name="website" value="{{ pasteVal($profile->website, 'website') }}" >
                  </div>
              </div>
            </div>





            <div class="col-12 col-sm-6">
              <div class="form-group">
                  <label>Gender</label>
                  <ul class="list-unstyled mb-0">
                      <li class="d-inline-block mr-2">
                          <fieldset>
                              <div class="vs-radio-con">
                                  <input type="radio" name="gender" @if($profile->gender == 1) checked @endif value="1">
                                  <span class="vs-radio">
                                      <span class="vs-radio--border"></span>
                                      <span class="vs-radio--circle"></span>
                                  </span>
                                  Male
                              </div>
                          </fieldset>
                      </li>
                      <li class="d-inline-block mr-2">
                          <fieldset>
                              <div class="vs-radio-con">
                                  <input type="radio" name="gender" @if($profile->gender == 2) checked @endif value="2">
                                  <span class="vs-radio">
                                      <span class="vs-radio--border"></span>
                                      <span class="vs-radio--circle"></span>
                                  </span>
                                  Female
                              </div>
                          </fieldset>
                      </li>
                      <li class="d-inline-block mr-2">
                          <fieldset>
                              <div class="vs-radio-con">
                                  <input type="radio" name="gender" @if($profile->gender == 3) checked @endif value="3">
                                  <span class="vs-radio">
                                      <span class="vs-radio--border"></span>
                                      <span class="vs-radio--circle"></span>
                                  </span>
                                  Other
                              </div>
                          </fieldset>
                      </li>

                  </ul>
              </div>
            </div>




            <div class="col-12">
              <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Address</h5>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                  <div class="controls">
                      <label>Address Line 1</label>
                      <input type="text" class="form-control" name="address1" value="{{ pasteVal($profile->address1, 'address1') }}">
                  </div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                  <div class="controls">
                      <label>Address Line 2</label>
                      <input type="text" class="form-control" name="address2" value="{{ pasteVal($profile->address2, 'address2') }}">
                  </div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                  <div class="controls">
                      <label>Postcode</label>
                      <input type="text" class="form-control" name="postcode" value="{{ pasteVal($profile->postcode, 'postcode') }}" >
                  </div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                  <div class="controls">
                      <label>City</label>
                      <input type="text" class="form-control" name="city" value="{{ pasteVal($profile->city, 'city') }}">
                  </div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
                  <div class="controls">
                      <label>State</label>
                      <input type="text" class="form-control" name="state" value="{{ pasteVal($profile->state, 'state') }}">
                  </div>
              </div>
            </div>

            <div class="col-12 col-sm-6">
              <div class="form-group">
                  <div class="controls">
                      <label>Country</label>
                      <input type="text" class="form-control" name="country" value="{{ pasteVal($profile->country, 'country') }}">
                  </div>
              </div>
            </div>



            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
        </div>
    </form>
    <!-- users edit Info form ends -->
</div>
