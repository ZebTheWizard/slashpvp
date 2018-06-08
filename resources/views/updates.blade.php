@extends('layouts.main')
@section('content')

<div class="container" style="max-width: 900px" v-pre>
    <div class="row">

      @forelse($updates as $update)
      <div class="card bg-dark text-white w-100 mb-3" id="update-{{ $update->id }}">
        <div class="d-flex align-items-center justify-content-between px-3 card-header">
          <h3 class="m-0">{{ $update->title }}</h3>

          <div class="d-flex align-items-center small text-muted">
            <span class="text-uppercase">{{ $update->type }}</span>
            <span class="mx-2">|</span>
            <span class="m-0">{{ $update->created_at->diffForHumans() }}</span>
          </div>

        </div>

          <div class="card-body pb-0 render-html">
             {!! $update->description !!}
          </div>
      </div>
      @empty
        <div class="text-muted text-center my-5 display-4 w-100">
          <div class="text-white">Uh-oh!</div>
          <div>We couldn't find any posts right now.</div>
        </div>
      @endforelse


    </div>
</div>

@endsection

<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio consequuntur facere voluptas asperiores est id sit necessitatibus quis. Iure aliquid, impedit quae eos porro amet molestiae. Vitae maxime id tempore!</p>
<ul>
  <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, accusantium, est ut iusto earum veniam, sint iure voluptatibus nulla aperiam sequi unde eos voluptas tenetur suscipit neque delectus cupiditate rerum?</li>
  <li>Ut doloremque unde dolores totam blanditiis excepturi porro nobis eius qui harum cupiditate ipsa modi, recusandae voluptates officiis atque reiciendis rem mollitia veniam minima reprehenderit praesentium sint? Maiores, impedit. Excepturi.</li>
  <li>Nulla ipsa odio doloremque dignissimos deleniti optio unde vel sed nisi beatae, enim sapiente. Dolorem eos eveniet molestias ipsam, rem est velit nobis voluptas, a omnis, mollitia voluptatibus quos cumque!</li>
  <li>Minus aperiam repudiandae at, nam placeat eius ut quisquam alias sint doloribus magnam est obcaecati temporibus officiis dignissimos a necessitatibus distinctio ducimus labore tempora perferendis unde porro. Enim, officia, maxime.</li>
</ul> -->
