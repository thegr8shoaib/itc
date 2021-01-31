@extends('layouts.dashboard')

@section('body')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        @include('common.messages')
        <div class="content-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Salemans</h4>
                            @if (superAdmin())
                              <a href="{{ route('salemans.create') }}" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Add Salemans</a>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="table-responsive mt-1">
                                <table class="table table-hover-animation mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email:</th>
                                            <th>Contact Number :</th>
                                            <th>Address :</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (!$salemans->count())
                                        <tr>
                                          <td colspan="10" class="text-center">
                                            <h2 class="py-2">No Result Found</h2>
                                          </td>
                                        </tr>
                                      @else
                                        @foreach ($salemans as $saleman)
                                        <tr>

                                            <td>
                                              {{ $loop->iteration }}
                                            </td>

                                            <td>
                                              {{ $saleman->name }}
                                            </td>

                                            <td>
                                              {{ $saleman->designation }}
                                            </td>

                                            <td>
                                              {{ $saleman->contactNumber }}
                                            </td>

                                            <td>
                                              {{ $saleman->address  }}
                                            </td>


                                            <td>
                                             <a   href="{{ route('salemans.edit',$saleman->id) }}"> <i class="fa fa-edit d-inline">  </i></a>
                                             <form class="d-inline" action="{{ route('salemans.destroy' , $saleman->id) }}" method="post">
                                                 @csrf


                                                 {{ method_field('delete') }}
                                               <button type="submit" name="button" class="bg-transparent border-0 d-inline text-danger "> <i class="fa fa-trash"> </i></button>

                                             </form>

                                            </td>

                                        </tr>
                                        @endforeach
                                      @endif


                                    </tbody>
                                </table>
                            </div>


                            @if ($salemans->count())
                            <div class="justify-content-center d-flex mt-2">
                              {{ $salemans->links() }}
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
