@extends('layouts.main')
@section('content')

<div class="container" style="max-width: 900px">
    <div class="row">


        @forelse($socials as $social)
            @component('c.box', [
                "url" => $social->url,
                "icon" => "fab fa-" . $social->platform,
                "label" => $social->platform
            ])@endcomponent
        @empty
        <div class="text-muted text-center my-5 display-4 w-100">
          <div class="text-white">Uh-oh!</div>
          <div>We couldn't find any social media right now.</div>
        </div>
        @endforelse
    </div>
</div>

@endsection
