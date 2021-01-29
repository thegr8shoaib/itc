@if ($profile->twitter || $profile->facebook || $profile->github || $profile->instagram ||
 $profile->linkdin || $profile->codepen || $profile->slack)
<div class="col-lg-6 col-xl-4 col-12">
    <div class="card">
        <div class="card-header">
            <h4>Social</h4>
        </div>
        <div class="card-body">

            @if ($profile->twitter)
            <div class="">
                <h6 class="mb-0">Twitter:</h6>
                <p>{{ $profile->twitter }}</p>
            </div>
            @endif
            @if ($profile->facebook)
            <div class="mt-1">
                <h6 class="mb-0">Facebook:</h6>
                <p>{{ $profile->facebook }}</p>
            </div>
            @endif

            @if ($profile->github)
            <div class="mt-1">
                <h6 class="mb-0">Github:</h6>
                <p>{{ $profile->github }}</p>
            </div>
            @endif
            @if ($profile->instagram)
            <div class="mt-1">
                <h6 class="mb-0">Instagram:</h6>
                <p>{{ $profile->instagram }}</p>
            </div>
            @endif
            @if ($profile->linkdin)
            <div class="mt-1">
                <h6 class="mb-0">Linkdin:</h6>
                <p>{{ $profile->linkdin }}</p>
            </div>
            @endif
            @if ($profile->codepen)
            <div class="mt-1">
                <h6 class="mb-0">Codepen:</h6>
                <p>{{ $profile->codepen }}</p>
            </div>
            @endif
            @if ($profile->slack)
            <div class="mt-1">
                <h6 class="mb-0">Slack:</h6>
                <p>{{ $profile->slack }}</p>
            </div>
            @endif





        </div>
    </div>

</div>

@endif
