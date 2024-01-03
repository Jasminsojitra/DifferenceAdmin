@extends('layouts.app')

@section('title', 'Edit Level')
@section('content')

    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Level</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route('level.update', $level->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Name</label>
                                        <input type="text" id="name" value="{{ $level->name }}"
                                            class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Category</label>
                                        <select id="category_id" class="form-control" name="category_id" required>
                                            <option value="0"> ----- </option>
                                            @foreach ($cats as $cat)
                                                <option @if ($level->category_id == $cat->id) selected @endif
                                                    value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">First Image</label>
                                        <input type="file" id="image" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Second Image</label>
                                        <input type="file" id="image" class="form-control" name="image2">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="img-fluid w-100 img-container">
                                        @foreach ($level->points as $item)
                                            <div
                                                style="width: 50px;height: 50px;border: 5px solid #fff;position: absolute;top: {{ $item->y }}%;left: {{ $item->x }}%;border-radius: 90px;transform: translate(-25px, -25px);">
                                                <span class="delete-form point-delete"
                                                    data-id="{{ $item->id }}">x</span>
                                            </div>
                                        @endforeach
                                        <img class="img-fluid w-100" src="{{ asset($level->image) }}"
                                            alt="{{ $level->name }}">
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="img-fluid w-100 img-container">
                                        @foreach ($level->points as $item)
                                            <div
                                                style="width: 50px;height: 50px;border: 5px solid #fff;position: absolute;top: {{ $item->y }}%;left: {{ $item->x }}%;border-radius: 90px;transform: translate(-25px, -25px);">
                                                <span class="delete-form point-delete"
                                                    data-id="{{ $item->id }}">x</span>
                                            </div>
                                        @endforeach
                                        <img class="img-fluid w-100" src="{{ asset($level->image2) }}"
                                            alt="{{ $level->name }}">
                                    </div>

                                </div>

                                <div class="col-12 mt-5 display-none">
                                    <h5>Points</h5>
                                    <div class="table-responsive table-bordered">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th>X</th>
                                                    <th>Y</th>
                                                </tr>
                                            </thead>
                                            <tbody class="points">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($level->points as $item)
                                                    <tr>
                                                        <td>
                                                            <input name="points[{{ $item->id }}][x]"
                                                                value="{{ $item->x }}" class="form-control" />
                                                        </td>
                                                        <td>
                                                            <input name="points[{{ $item->id }}][y]"
                                                                value="{{ $item->y }}" class="form-control" />
                                                        </td>
                                                        <td>
                                                            <div class="">

                                                                <button type="button" data-id={{ $item->id }}
                                                                    class="btn icon btn-danger delete-form"
                                                                    title="Delete"><i class="bi bi-x"></i></button>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                    </form>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($level->points as $item)
                        <form id="form_{{ $item->id }}" class="d-inline" method="POST"
                            action="{{ route('point.delete', $item->id) }}" onsubmit="return confirm( 'are you sure ?' )">
                            @csrf
                        </form>
                        @php
                            $i = $item->id + 1;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script>
        var i = {{ $i }};
        $('img').on('click', function(e) {
            var offset = $(this).offset();
            var x = Math.floor((e.pageX - offset.left) / $(this).width() * 10000) / 100
            var y = Math.floor((e.pageY - offset.top) / $(this).height() * 10000) / 100


            $('.img-container').append(
                '<div class="point_' + i +
                '" style="width: 50px;height: 50px;border: 5px solid #fff;position: absolute;top: ' + y +
                '%;left: ' + x +
                '%;border-radius: 90px;transform: translate(-25px, -25px);"><span class="delete-point point-delete" data-id="' +
                i + '">x</span></div>')
            $('.points').append('<tr class="point_' + i + '"><td><input name="points[' + i + '][x]" value="' + x +
                '" class="form-control" /></td><td><input name="points[' + i + '][y]" value="' + y +
                '" class="form-control" /></td><td><div class="buttons"><button type="button" class="btn icon btn-danger delete-point" data-id="' +
                i + '" title="Delete"><i class="bi bi-x"></i></button></div></td></tr>')
            i++;
        });

        $('body').on('click', '.delete-point', function(e) {
            if (confirm('are you sure ?')) {
                $('.point_' + $(this).data('id')).remove();
            }
            return false;
        });

        $('body').on('click', '.delete-form', function(e) {
            $('#form_' + $(this).data('id')).submit();
            return false;
        });
    </script>
@endpush

@push('css')
    <style>
        .img-container {
            position: relative;
        }
    </style>
@endpush
