@if ($profile->address1 || $profile->address2 || $profile->city || $profile->state || $profile->country)
<div class="col-lg-6 col-xl-4 col-12">
    <div class="card">
        <div class="card-header">
            <h4>Address</h4>
        </div>
        <div class="card-body">

            @if ($profile->address1)
            <div class="">
                <h6 class="mb-0">Address 1:</h6>
                <p>{{ $profile->address1 }}</p>
            </div>
            @endif
            @if ($profile->address2)
            <div class="mt-1">
                <h6 class="mb-0">Address 2:</h6>
                <p>{{ $profile->address2 }}</p>
            </div>
            @endif

            @if ($profile->postcode)
            <div class="mt-1">
                <h6 class="mb-0">Postcode:</h6>
                <p>{{ $profile->postcode }}</p>
            </div>
            @endif
            @if ($profile->city)
            <div class="mt-1">
                <h6 class="mb-0">City:</h6>
                <p>{{ $profile->city }}</p>
            </div>
            @endif
            @if ($profile->state)
            <div class="mt-1">
                <h6 class="mb-0">State:</h6>
                <p>{{ $profile->state }}</p>
            </div>
            @endif
            @if ($profile->country)
            <div class="mt-1">
                <h6 class="mb-0">Country:</h6>
                <p>{{ $profile->country }}</p>
            </div>
            @endif





        </div>
    </div>

</div>

@endif
