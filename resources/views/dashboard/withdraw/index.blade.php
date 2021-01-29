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
                            <h4 class="mb-0">Withdraw</h4>
                            @if (!superAdmin())
                              <a href="{{ route('withdraws.create') }}" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Make new Withdraw</a>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="table-responsive mt-1">
                                <table class="table table-hover-animation mb-0">
                                    <thead>
                                        <tr>
                                            @if (superAdmin())
                                              <th>Name</th>
                                              <th>Email</th>
                                            @endif
                                            <th>Gateway</th>
                                            <th>Account #</th>
                                            <th>Account Title</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            <th title="Request Recieved">Date</th>
                                            @if (superAdmin())
                                            <th>Action</th>
                                            @endif

                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (!$withdraws->count())
                                        <tr>
                                          <td colspan="6" class="text-center">
                                            <h2 class="py-2">No Result Found</h2>
                                          </td>
                                        </tr>
                                      @else
                                        @foreach ($withdraws as $withdraw)


                                        <tr>
                                            @if (superAdmin())
                                              <td>{{ $withdraw->user->name }}</td>
                                              <td>{{ $withdraw->user->email }}</td>
                                            @endif

                                            <td>
                                              {{ $withdraw->gateway }}
                                            </td>
                                            <td>{{ $withdraw->accountNumber }}</td>
                                            <td>
                                              @if ($withdraw->accountTitle)
                                                {{ $withdraw->accountTitle }}
                                              @else
                                                -                                              
                                              @endif

                                            </td>
                                            <td >
                                              @if ($withdraw->status == 1)
                                                <div class="badge badge-pill badge-light-info">Pending</div>
                                              @elseif ($withdraw->status == 2)
                                                <div class="badge badge-pill badge-light-success">Approved</div>
                                              @elseif ($withdraw->status == 3)
                                                <div class="badge badge-pill badge-light-danger">Declined</div>
                                              @endif
                                            </td>
                                            <td>
                                              {{ $withdraw->amount }}
                                            </td>
                                            <td title="{{ $withdraw->created_at }}">{{ $withdraw->created_at->diffForHumans() }}</td>
                                            @if (superAdmin())

                                              <td>
                                                <a href="{{ route('withdraws.edit',$withdraw->id) }}"><i class="users-edit-icon feather icon-edit-1 mr-50"></i></a>


                                                <a class="deleteConfirm" href="javascript:void(0)" data-obj='{
                                                  "userId": "{{$withdraw->id}}",
                                                  "url": "{{ route('withdraws.destroy', $withdraw->id) }}",
                                                  "method": "delete"
                                                }' data-html="Delete withdraw request?" >
                                                <i class="users-delete-icon feather icon-trash-2"></i></a>

                                              </td>
                                            @endif


                                        </tr>
                                        @endforeach
                                      @endif


                                    </tbody>
                                </table>
                            </div>


                            @if ($withdraws->count())
                            <div class="justify-content-center d-flex mt-2">
                              {{ $withdraws->links() }}
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
