@extends('Comingsoon::coming_soon_admin.layouts.app')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="mx-auto col-md-10">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{!! $error !!}</div>
                        @endforeach
                    @endif --}}

                </div>
                <div class="mx-auto col-md-10">
                    <div class="mb-4 card">
                        <form class="card-body" action="{{ route('coming_soon.update', $item->id) }}" method="post">
                            @csrf
                            <h4 class="mb-4 text-center">Edit Coming Soon Page</h4>
                            <div class="mx-2 row">
                                <div class="mx-auto mb-3 col-12">
                                    <label class="form-label" for="Title">Title</label>
                                    <input class="form-control" id="Title" type="text" name="title"
                                        value="{{ $item->title }}" placeholder="Title">
                                </div>
                                <div class="mx-auto mb-3 col-12">
                                    <label class="form-label" for="Url">Url</label>
                                    <input class="form-control" id="Url" type="url" name="url"
                                        value="{{ $item->page_url }}/" />
                                </div>

                                <div class="mx-auto mb-3 col-12">
                                    <label class="form-label" for="DateTime">Launch Date and Time</label>
                                    <input class="form-control" id="DateTime" type="datetime-local" name="launch_time"
                                        value="{{ $item->launch_time }}">
                                </div>

                                <div class="mx-auto mb-3 col-12">
                                    <label class="form-label" for="Page Descriptions">Descriptions</label>
                                    <textarea class="form-control" placeholder="Descriptions" name="descritions" rows="6">{{ $item->description }}</textarea>
                                </div>

                                <div class="my-3 mx-autp col-12">
                                    <button class="btn btn-info w-100" type="submit">Create</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
