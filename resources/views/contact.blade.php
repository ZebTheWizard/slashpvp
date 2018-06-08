@extends('layouts.main')
@section('content')

<div class="container" style="max-width: 900px">
    <div class="row">
      <div class="form-wrapper">
        <form action="/contact" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{ old('name') }}"class="form-control bg-dark text-white" id="name" name="name" placeholder="Enter Name...">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" value="{{ old('email') }}"class="form-control bg-dark text-white" id="email" name="email" placeholder="Enter Email...">
            @if(env('APP_DEMO'))
            <small>for demo purposes the contact request will be sent to this email.</small>
            @endif
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" value="{{ old('message') }}"rows="8" cols="80" class="form-control bg-dark text-white" id="message" placeholder="Enter a detailed message here..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Sumbit</button>
        </form>
      </div>
    </div>
</div>

@endsection
