@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
          <form action="/update/create" method="post">
            @csrf
            <input type="hidden" name="description" id="app-description-value">
            <div class="card bg-dark text-white mb-5">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="m-0">Create Update</h5>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>


              <div class="card-body" v-pre>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" value="{{ old('title') }}" class="form-control bg-dark text-white" id="title" name="title" placeholder="Enter Title...">
                </div>
                <div class="form-group">
                  <label for="type">Type</label>
                  <select name="type" id="type" class="custom-select custom-select-lg bg-dark text-white">
                    @if (old('type'))
                      <option selected="selected" value="{{ old('type') }}">{{ old('type') }}</option>
                    @else
                      <option selected="selected" disabled="disabled" value="">--- Select type ---</option>
                    @endif
                    @foreach(config('updateTypes') as $type)
                      <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group render-html">
                  <label>Description</label>
                  <editor v-pre> {!! old('description') ?? "Hello world" !!}</editor>
                </div>
              </div>
            </div>
          </form>

          <div class="card bg-dark text-white mb-5">
                <h5 class="card-header">Manage Updates</h5>

                <!-- <div class="card-body"> -->
                  <form action="/update/delete" method="post">
                    @csrf
                    <div class="list-group list-group-flush">
                      @forelse($updates as $update)
                       <div class="list-group-item list-group-item-action bg-dark text-white d-flex align-items-center justify-content-between">
                         <a class="text-white" href="/updates#update-{{$update->id}}">{{$update->title}}</a>
                         <button type="submit" name="id" value="{{ $update->id }}" class="btn btn-danger btn-sm d-flex align-items-center">
                           <i class="fas fa-times"></i>
                         </button>
                       </div>
                      @empty
                       <div class="list-group-item text-white bg-dark">No updates...</div>
                      @endforelse
                    </div>
                  </form>

                <!-- </div> -->
            </div>

          <form action="/social/create" method="post">
              @csrf
              <div class="card bg-dark text-white mb-5">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="m-0">Create Social Button</h5>
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>


                <div class="card-body" v-pre>
                  <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" value="{{ old('url') }}" class="form-control bg-dark text-white" id="url" name="url" placeholder="Enter Url...">
                  </div>
                  <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="custom-select custom-select-lg bg-dark text-white">
                      @if (old('type'))
                        <option selected="selected" value="{{ old('type') }}">{{ old('type') }}</option>
                      @else
                        <option selected="selected" disabled="disabled" value="">--- Select type ---</option>
                      @endif
                      @foreach(config('socials') as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
          </form>

          <div class="card bg-dark text-white mb-5">
                  <h5 class="card-header">Manage Social Buttons</h5>

                  <!-- <div class="card-body"> -->
                    <form action="/social/delete" method="post">
                      @csrf
                      <div class="list-group list-group-flush">
                        @forelse($socials as $social)
                         <div class="list-group-item list-group-item-action bg-dark text-white d-flex align-items-center justify-content-between">
                           <a class="text-white" href="{{$social->url}}">{{$social->platform}}</a>
                           <button type="submit" name="id" value="{{ $social->id }}" class="btn btn-danger btn-sm d-flex align-items-center">
                             <i class="fas fa-times"></i>
                           </button>
                         </div>
                        @empty
                         <div class="list-group-item text-white bg-dark">No social buttons...</div>
                        @endforelse
                      </div>
                    </form>

                  <!-- </div> -->
              </div>

          <div class="card bg-dark text-white">
                    <h5 class="card-header">Logout</h5>

                    <!-- <div class="card-body"> -->
                      <form action="/logout" method="post">
                        @csrf
                        <div class="card-body">
                          <button type="submit" class="btn btn-danger">Logout</button>
                        </div>
                      </form>

                    <!-- </div> -->
                </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
@endsection
