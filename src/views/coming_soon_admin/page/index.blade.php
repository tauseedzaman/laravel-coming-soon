@extends('admin.layouts.app')
@section('title')
    Manage Pages
@endsection
@section('content')
    @php
        $pages = tauseedzaman\ComingSoon\Models\Page::latest()->paginate(8);
    @endphp
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
                    <div class="row">
                        <div class="col-2 ml-auto mb-2">
                            <a href="{{ route('admin.page.create') }}" class="btn float-right btn-info">Create Page</a>
                        </div>
                    </div>
                    <div class="mb-4 p-4 card">
                        <h2>Manage Pages</h2>
                        <table class="table" style="overflow-x: none">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody style="overflow-x: none">
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="p-0 btn btn-transparent" type="button"
                                                    data-coreui-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg class="icon">
                                                        <use
                                                            xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('admin.page.edit', $page->id) }}"
                                                        class="dropdown-item">Edit</a>
                                                    <a href="{{ route('admin.page.delete', $page->id) }}"
                                                        class="dropdown-item delete-user text-danger">Delete</a>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $pages->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
        </div>
    </section>
@endsection
