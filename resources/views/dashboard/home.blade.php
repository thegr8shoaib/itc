@extends('layouts.dashboard')

@section('body')
  <!-- BEGIN: Content-->
  <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">

           @include('common.messages')
          <div class="content-body">





              <!-- Vuexy Checkbox Sizes start -->
              <section class="vuexy-checkbox-sizes">
                  <div class="row">

                    @if (!superAdmin())
                      <div class="col-lg-4 col-sm-12 col-12">
                          <div class="card">
                              <div class="card-header d-flex align-items-start pb-0">
                                  <div>
                                      <h2 class="text-bold-700 mb-0">{{ $user->balance }}</h2>
                                      <p>Account Balance</p>
                                  </div>
                                  <div class="avatar bg-rgba-primary p-50 m-0">
                                      <div class="avatar-content">
                                          <i class="fa fa-money text-primary font-medium-5"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-12 col-12">
                          <div class="card">
                              <div class="card-header d-flex align-items-start pb-0">
                                  <div>
                                      <h2 class="text-bold-700 mb-0">{{ $totalDeposit }}</h2>
                                      <p>Total Deposit</p>
                                  </div>
                                  <div class="avatar bg-rgba-primary p-50 m-0">
                                      <div class="avatar-content">
                                          <i class="feather icon-inbox text-primary font-medium-5"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-12 col-12">
                          <div class="card">
                              <div class="card-header d-flex align-items-start pb-0">
                                  <div>
                                      <h2 class="text-bold-700 mb-0">{{ $totalWithdraw }}</h2>
                                      <p>Total Withdraw</p>
                                  </div>
                                  <div class="avatar bg-rgba-primary p-50 m-0">
                                      <div class="avatar-content">
                                          <i class="feather icon-send text-primary font-medium-5"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    @else

                      <div class="col-lg-4 col-sm-12 col-12">
                          <div class="card">
                              <div class="card-header d-flex align-items-start pb-0">
                                  <div>
                                      <h2 class="text-bold-700 mb-0">
                                        <a href="{{ route('users.index') }}">{{ $userCount }}</a>
                                      </h2>
                                      <p>Total Prodocts</p>
                                  </div>
                                  <div class="avatar bg-rgba-primary p-50 m-0">
                                      <div class="avatar-content">
                                          <i class="feather icon-users text-primary font-medium-5"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-12 col-12">
                          <div class="card">
                              <div class="card-header d-flex align-items-start pb-0">
                                  <div>
                                    
                                      <p>Pending Deposit Requests</p>
                                  </div>
                                  <div class="avatar bg-rgba-primary p-50 m-0">
                                      <div class="avatar-content">
                                          <i class="feather icon-inbox text-primary font-medium-5"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-12 col-12">
                          <div class="card">
                              <div class="card-header d-flex align-items-start pb-0">
                                  <div>
                                      <h2 class="text-bold-700 mb-0">
                                        <a href="{{ route('withdraws.index') }}">{{ $withdrawRequests }}</a>
                                      </h2>
                                      <p>Pending Withdraw Requests</p>
                                  </div>
                                  <div class="avatar bg-rgba-primary p-50 m-0">
                                      <div class="avatar-content">
                                          <i class="feather icon-send text-primary font-medium-5"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>



                    @endif

                  </div>



                  @if (!superAdmin())


                    <div class="col-12 p-0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Recent Earning</h4>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive mt-1">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Time</th>
                                                <th>Title</th>
                                                <th>Amount</th>
                                                <th>Package</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if (!$balanceHistory->count())
                                            <tr>
                                              <td colspan="6" class="text-center">
                                                <h2 class="py-2">No Result Found</h2>
                                              </td>
                                            </tr>
                                          @else
                                            @foreach ($balanceHistory as $balanceHist)


                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $balanceHist->created_at->diffForHumans() }}</td>
                                                <td >
                                                  {{ $balanceHist->video->title }}
                                                </td>
                                                <td >
                                                  {{ $balanceHist->price }}
                                                </td>

                                                 <td>
                                                   {{ $balanceHist->packege }}
                                                 </td>

                                            </tr>
                                            @endforeach
                                          @endif


                                        </tbody>
                                    </table>
                                </div>





                            </div>
                        </div>
                    </div>


                  @else
                    <div class="col-12 p-0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Recent Users</h4>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive mt-1">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Joined</th>
                                                <th>Profile</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if (!$users->count())
                                            <tr>
                                              <td colspan="6" class="text-center">
                                                <h2 class="py-2">No Result Found</h2>
                                              </td>
                                            </tr>
                                          @else
                                            @foreach ($users as $user)


                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td >
                                                  @if ($user->status == 1)
                                                    <div class="badge badge-pill badge-light-success">Active</div>
                                                  @elseif ($user->status == 2)
                                                    <div class="badge badge-pill badge-light-danger">Blocked</div>
                                                  @elseif ($user->status == 3)
                                                    <div class="badge badge-pill badge-light-warning">Deactivated</div>
                                                  @endif
                                                </td>
                                                <td title="{{ $user->created_at }}">{{ $user->created_at->diffForHumans() }}</td>
                                                <td class="p-1">
                                                  @if ($user->image)
                                                    <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"  class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="{!! asset("storage/" . $user->image) !!}" alt="Avatar" height="30" width="30">
                                                        </li>
                                                    </ul>
                                                  @else
                                                    <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"  class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="{!! asset('mawaisnow/svg/profile.svg') !!}" alt="Avatar" height="30" width="30">
                                                        </li>
                                                    </ul>
                                                  @endif
                                                </td>
                                                <td>
                                                  <a href="{{ route('profileUpdate',$user->id) }}"><i class="users-edit-icon feather icon-edit-1 mr-50"></i></a>


                                                  <a class="deleteConfirm" href="javascript:void(0)" data-obj='{
                                                    "userId": "{{$user->id}}",
                                                    "url": "{{ route('users.destroy', $user->id) }}",
                                                    "method": "delete"
                                                  }' data-html="Once you delete this user, all of it's related Data will be deleted, including subscription." >
                                                  <i class="users-delete-icon feather icon-trash-2"></i></a>

                                                </td>

                                            </tr>
                                            @endforeach
                                          @endif


                                        </tbody>
                                    </table>
                                </div>





                            </div>
                        </div>
                    </div>
                  @endif

              </section>
              <!-- Vuexy Checkbox Sizes end -->

          </div>
      </div>
  </div>
  <!-- END: Content-->
@endsection
