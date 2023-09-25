@extends('admin.layouts.app')
@section('title')
    Manage Page
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="mx-auto col-md-10">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{!! $error !!}</div>
                        @endforeach
                    @endif

                </div>
                <div class="mx-auto col-md-10">
                    <div class="mb-4 card">
                        <form class="card-body" action="{{ route('admin.page.save') }}" method="post">
                            @csrf
                            <h4 class="mb-4 text-center">Create Page</h4>
                            <div class="mx-2 row">
                                <div class="mx-auto mb-3 col-12">
                                    <label class="form-label" for="Page Title">Page Title</label>
                                    <input class="form-control" id="Page Title" type="text" name="title" value=""
                                        placeholder="Page Title">
                                </div>

                                <div class="mx-auto mb-3 col-12">
                                    <label class="form-label" for="Page Descriptions">Page Content</label>
                                    <textarea id="my-textarea" class="form-control" placeholder="Page Descriptions" name="content" rows="6"></textarea>
                                </div>

                                <div class="my-3 mx-autp col-12">
                                    <button class="btn btn-info w-100" type="submit">Submit</button>
                                </div>
                        </form>
                        <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/formats/bbcode.min.js"></script>
                        <script>
                            // Replace the textarea #example with SCEditor
                            var textarea = document.getElementById('my-textarea');
                            sceditor.create(textarea, {
                                format: 'bbcode',
                                style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css'
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
