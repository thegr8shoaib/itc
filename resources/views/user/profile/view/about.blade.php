<div class="col-lg-6 col-xl-4 col-12">
    <div class="card">
        <div class="card-header">
            <h4>About</h4>
            {{-- <i class="feather icon-more-horizontal cursor-pointer"></i> --}}
        </div>
        <div class="card-body">
            @if ($profile->bio)
              <p>{{ $profile->bio }}</p>
            @endif
            <div class="@if ($profile->bio) mt-1 @endif">
                <h6 class="mb-0">Joined:</h6>
                <p>{{ $user->created_at->format('F, d, Y') }}</p>
            </div>

            <div class="mt-1">
                <h6 class="mb-0">Email:</h6>
                <p>{{ $user->email }}</p>
            </div>
            @if ($profile->website)
              <div class="mt-1">
                  <h6 class="mb-0">Phone:</h6>
                  <p>
                    {{ $profile->mobile }}
                  </p>
              </div>
            @endif
            @if ($profile->dob)
              <div class="mt-1">
                  <h6 class="mb-0">Date Of Birth:</h6>
                  <p>
                    {{ $profile->dob }}
                  </p>
              </div>
            @endif
            @if ($profile->website)
              <div class="mt-1">
                  <h6 class="mb-0">Website:</h6>
                  <p>
                    <a href="{{ $profile->website }}">{{ $profile->website }}</a>
                  </p>
              </div>
            @endif

            


        </div>
    </div>
</div>
