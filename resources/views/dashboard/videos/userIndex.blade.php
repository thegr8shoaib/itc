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
                            <h4 class="mb-0">Add Product</h4>
                            @if (superAdmin())
                              <a href="{{ route('cashvideos.create') }}" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Add Cash Videos</a>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="table-responsive mt-1">
                                <table class="table table-hover-animation mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th class="text-center">Action</th>
                                            <th>Durration</th>
                                            <th>Price Per Ad</th>
                                            <th class="Date Added">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (!$videos->count())
                                        <tr>
                                          <td colspan="6" class="text-center">
                                            <h2 class="py-2">No Result Found</h2>
                                          </td>
                                        </tr>
                                      @else
                                        @foreach ($videos as $video)
                                        <tr>

                                            <td>
                                              {{ $loop->iteration }}
                                            </td>

                                            <td>
                                              {{ $video->title }}
                                            </td>


                                            <td class="text-center" >
                                              @if ($video->watched)
                                                <a class="btn btn-relief-success"  href="javascript:void(0)">Watched</a>
                                              @else
                                                <a  class="btn btn-flat-success" href="{{ route('video' , encrypt($video->id)) }}">Watch</a>
                                              @endif
                                            </td>
                                            <td>
                                              @if ($video->durration != 1)
                                                {{ $video->durration }} Seconds
                                              @else
                                              {{ $video->durration }} Second
                                              @endif
                                            </td>

                                            <td>
                                              {{ $perAdPrice }}
                                            </td>

                                            <td title="{{ $video->created_at }}">{{ $video->created_at->diffForHumans() }}</td>



                                        </tr>
                                        @endforeach
                                      @endif


                                    </tbody>
                                </table>
                            </div>


                            {{-- @if ($videos->count())
                            <div class="justify-content-center d-flex mt-2">
                              {{ $videos->links() }}
                            </div>
                            @endif --}}


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
