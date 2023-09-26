@extends('Coming_soon.layouts.app')
@section('content')
    <div class="px-3 body flex-grow-1">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12 card">
                    <!-- /.row--><br>
                    <div class="table-responsive" style="overflow-x: none !important">
                        <div class="row">
                            <div class="col">
                                <h3 class="p-2">Scheduled Launches</h3>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('coming_soon.create') }}" class="btn btn-info">Add New</a>
                            </div>
                        </div>
                        <table class="table mb-0 border">
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Launch Time</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr class="align-middle">
                                        <td>
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            {{ $item->page_url }}
                                        </td>

                                        <td style="width: 150px;">
                                            <div class="small text-medium-emphasis">
                                                {{ \Carbon\Carbon::parse($item->launch_time)->format('d/m/Y h:i A') }}</div>
                                            <div class="fw-semibold">
                                                {{ \Carbon\Carbon::parse($item->launch_time)->diffForHumans() }}</div>
                                        </td>

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
                                                    <a href="{{ route('coming_soon.edit', $item->id) }}"
                                                        class="dropdown-item">Edit</a>
                                                    <a href="{{ route('coming_soon.delete', $item->id) }}"
                                                        class="dropdown-item text-danger delete-user">Delete</a>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
