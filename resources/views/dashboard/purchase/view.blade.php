@extends('layouts.dashboard')

@section('body')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper" id="sectionContainer">
        <div class="content-header row">
            <div class="col-12">


                <div v-if="status == 'unstarted'">
                  <a href="#" class="btn btn-success mr-1 mb-1" v-on:click="playCurrentVideo">Start</a>
                </div>
                <div v-else-if="status == 'paused'">
                  <a href="#" class="btn btn-success mr-1 mb-1" v-on:click="playCurrentVideo">Resume</a>
                </div>
                <div v-else="status == 'playing'" class="progress progress-bar-primary progress-xl">
                    <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar"
                     v-bind:style="{ width: timeCount + '%' }"></div>
                </div>
                <div  class="row">

                  <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0"  v-cloak>@{{ max == 1 ? '1 Second': max + " Seconds" }}</h2>
                                <p>Total Time</p>
                            </div>
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-clock text-primary font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                      <div class="card">
                          <div class="card-header d-flex align-items-start pb-0">
                              <div>
                                  <h2 class="text-bold-700 mb-0"  v-cloak>@{{ timeLeft }}</h2>
                                  <p>Time Left</p>
                              </div>
                              <div class="avatar bg-rgba-primary p-50 m-0">
                                  <div class="avatar-content">
                                      <i class="feather icon-clock text-primary font-medium-5"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                </div>
            </div>
        </div>
        @include('common.messages')
        <div class="content-body" id="videoContainer">

                        @verbatim
                          <div id="containerMaster">


                           <div id="player" ></div>
                           <br>

                           Status: {{ status }}



                          </div>
                        @endverbatim






        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('pageend')
  <script src="https://www.youtube.com/iframe_api" charset="utf-8"></script>
<script type="text/javascript">

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
};

</script>
  @include('dashboard.videos.js')

@if(superAdmin())
<script type="text/javascript">




new Vue({
 el : "#sectionContainer",
 data : {
    player: null,
    loop:0,
    videoId: "{{ $video->video_id }}",
    autoplay:0,
    status: '...',
    timer: 0,
    max: {{$video->durration}},
    videoMax: 0,
    r: null
 },
 computed: {
   timeCount: function () {
     return (this.timer / this.max) * 100;
   },
   timeLeft: function () {
     var t = this.max - this.timer;
     if (t == 1) {
       return t + " Second";
     }else if (t < 0) {
       return "Completed";
     }else {
       return t + " Seconds"
     }

   }
 },

 methods: {


     playCurrentVideo() {
       this.player.playVideo();
     },


     onPlayerReady(e){
       e.target.playVideo();
       this.player = e.target;
     },
     onStateChanged(e){
       this.videoMax = this.player.getDuration();

       var playerStatus = e.data;
       if (playerStatus == -1) {
         this.status = "unstarted";
       } else if (playerStatus == 0) {
         this.status = "ended";
         this.playCurrentVideo();
       } else if (playerStatus == 1) {
         this.status = "playing";
       } else if (playerStatus == 2) {
         this.status = "paused";
       } else if (playerStatus == 3) {
         this.status = "loading";
       } else if (playerStatus == 5) {
         this.statsu = "video cued";
       }

     },

     startPlayer(){

       this.player = new YT.Player('player', {
         videoId: this.videoId,
         playerVars: {
           'autoplay': 1,
           'controls': 0,
           'loop': 1,
           'rel':0,
           'disablekb': 1,
           'modestbranding': 1,
           'origin': '{{ url()->current() }}'
         },
         host: 'http://www.youtube-nocookie.com',
         width: "100%",
         height: "750px",
         events: {
           'onReady': this.onPlayerReady,
           'onStateChange': this.onStateChanged
         }
       });


     },

     redirectUser(){
       axios({
          method: 'post',
          url: '{{ route('videoWatcheURL', encrypt($video->id)) }}',
          data: {
            m: '{{ encrypt(Auth::id()) }}'
          }
        }).then(function (result) {

          window.location.replace(result.data);

        });
     }

   },


   mounted(){

     window.YT.ready(function () {

     this.startPlayer();

     this.intervalNo = setInterval(function () {
       if (this.status == "playing") {
         this.timer = this.timer + 1;
       }
       if (this.timeLeft == "Completed") {
         clearInterval(this.intervalNo)
         this.redirectUser();
       }

       this.$forceUpdate();

     }.bind(this), 1000);

     }.bind(this));

   }

})






</script>

@endif

@include('common.sweetalert')


@endsection

@section('headend')
  <script src="{!! asset('mawaisnow/vue.js') !!}" charset="utf-8"></script>
  <script src="{!! asset('mawaisnow/axios.min.js') !!}" charset="utf-8"></script>
  <style media="screen">
  .progress.progress-xl {
    height: 5.14rem;
  }
  [v-cloak] {
    display: none;
  }
  </style>
@endsection
