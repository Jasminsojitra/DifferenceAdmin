@extends('layouts.app')

@section('title', 'Categories')
@section('content')

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            challenges
                        </div>
                        <div class="col-3 row justify-content-end">
                            <a href="{{ route('challenge.create') }}" class='btn btn-primary'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Create challenge</span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="avatar avatar-x me-3"><img src="{{ asset($item->image) }}"
                                                alt="{{ $item->name }}"></div>
                                    </td>
                                    <td>
                                        <div class="buttons">

                                            <a href="{{ route('challenge.edit', $item->id) }}" class="btn icon btn-primary"
                                                title="Edit"><i class="bi bi-pencil"></i></a>

                                                <a href="{{ route('level.edit', $item->level_id) }}" class="btn icon btn-primary"
                                                    title="Edit challenge level"><i class="bi bi-pencil"></i></a>

                                            
                                            <form class="d-inline" method="POST"
                                                action="{{ route('challenge.delete', $item->id) }}"
                                                onsubmit="return confirm( 'are you sure ?' )">
                                                @csrf
                                                <button type="submit" class="btn icon btn-danger" title="Delete"><i
                                                        class="bi bi-x"></i></button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endpush

@push('js')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endpush