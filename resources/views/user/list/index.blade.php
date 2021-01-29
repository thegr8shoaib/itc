@extends('layouts.dashboard')

@section('body')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        {{-- <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Users</h2>
                    </div>
                </div>
            </div>

        </div> --}}
        @include('common.messages')
        <div class="content-body">



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Users</h4>
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
                                                        <img class="media-object rounded-circle" src="{!! asset($user->image) !!}" alt="Avatar" height="30" width="30">
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


                            @if ($users->count())
                            <div class="justify-content-center d-flex mt-2">
                              {{ $users->links() }}
                            </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('pageend')
  @include('common.sweetalert')
@endsection

@section('headend')
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
@endsection
