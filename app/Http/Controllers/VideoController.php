<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Auth;
use App\Watch;
use App\BlanceHistory;
use App\User;

class VideoController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('subscribed')->only(['video','product', 'videoWUrl']);
    }
    public function videoWatched(Request $request, $encryptedId, $created_at)
    {
      try {
        $videoId = decrypt($encryptedId);
        $created_at = decrypt($created_at);
      } catch (\Exception $e) {
        return error('Link is broken');
      }
      $userId = Auth::id();
      $user = Auth::user();

      $video = Video::find($videoId);
      if ($video == null) {
        return error('Link is broken');
      }
      if (!$video->created_at->eq($created_at)) {
        return error('Link is broken');
      }
      if ($video->isExpired() || $video->status == 2) {
        return error('This video has been expired');
      }
      if (Watch::where('user_id',$userId)->where('video_id',$videoId)->count()) {
        return errorTo("You have already watched this video",'myCashVideos');
      }

      $perAdPrice = round($user->membership->plan->totalReturn / 300,2);
      // $amount =
      if (!BlanceHistory::where('video_id',$videoId)->where('user_id',$userId)->count()) {
        BlanceHistory::create([
          'video_id'=> $videoId,
          'user_id'=> $userId,
          'packege' => $user->membership->plan->name,
          'price'=> $perAdPrice
        ]);
      }
      Watch::create([
        'user_id'=> $userId,
        'video_id'=> $video->id
      ]);
      User::where('id',$userId)->update([
        'balance'=> $user->balance + $perAdPrice
      ]);

      return statusTo('Video view complete', route('myCashVideos'));
    }
    public function videoWUrl(Request $request, $encryptedId)
    {
      try {
        $videoId = decrypt($encryptedId);
      } catch (\Exception $e) {
        return error('Link is broken');
      }
      $video = Video::find($videoId);

      return route('videoWatched',[encrypt($videoId),encrypt($video->created_at)]);

    }
    public function video(Request $request, $encryptedId)
    {
      try {
        $videoId = decrypt($encryptedId);
      } catch (\Exception $e) {
        return error('Link is broken');
      }
      $video = Video::find($videoId);
      if ($video->isExpired() || $video->status == 2) {
        return error('This video has been expired');
      }

      return view('dashboard.videos.view', compact('video'));
    }
    public function myCashVideos(Request $request)
    {
      $array = [];

      $datetime = \Carbon\Carbon::now();
      $datetime = $datetime->addDays(1);
      $activeTime = $datetime->toDateTimeString();

      $videos = Video::where('status',1)->where('created_at', '<',$activeTime)->get();
      $videos = $videos->map(function ($obj) {
        $obj->watched = false;
        if (Watch::where('user_id',Auth::id())->where('video_id',$obj->id)->count()) {
          $obj->watched = true;
        }
        return $obj;
      });
      $array['videos'] = $videos;

      $array['watches'] = Watch::with('video')->where('user_id', Auth::id())->paginate(20);

      $array['perAdPrice'] = Auth::user()->membership->plan->perAdPrice();

      return view('dashboard.videos.userIndex', $array);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = [];
        if (superAdmin()) {
            $array['videos'] = Video::orderBy('status')->orderBy('id','desc')->paginate(10);
        }

        return view('dashboard.videos.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.videos.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];
        for ($i=1; $i <= 5; $i++) {
            $rules['video'. $i] = 'required|min:3|string|max:255';
            $rules['video'. $i . 'time'] = 'required|min:1|numeric|max:100';
        }


        $data = $request->validate($rules);

        $video1 = getYoutubeVideoInfo($request->video1);
        $video2 = getYoutubeVideoInfo($request->video2);
        $video3 = getYoutubeVideoInfo($request->video3);
        $video4 = getYoutubeVideoInfo($request->video4);
        $video5 = getYoutubeVideoInfo($request->video5);

        $videos = [];

        for ($i=1; $i <= 5; $i++) {
            if (${"video". $i} === 404) {
                return error("Video # $i is not valid");
            }

            $obj = ${"video". $i};
            try {
                $title = $obj->title;
            } catch (\Exception $e) {
                $title = "Cash Video";
            }

            $videos[] = [
            'title'=> $title,
            'durration'=> $data['video'. $i . 'time'],
            'status'=> 1,
            'user_id'=> Auth::id(),
            'video_id'=> $request->{"video". $i}
          ];
        }
        Video::where('status', '!=', 2)->update([
          'status'=> 2
        ]);
        for ($i= 0; $i < 5; $i++) {
            Video::create($videos[$i]);
        }

        return statusTo("Cash videos added", route('cashvideos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
