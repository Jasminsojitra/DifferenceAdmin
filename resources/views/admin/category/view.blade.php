@extends('layouts.app')

@section('title', 'View Category')
@section('content')

<div class="page-content">
    <div class="table-responsive">
        <table class="table table-lg">

            <tbody>
                <tr>
                    <td class="text-bold-500">Name</td>
                    <td>{{ $cat->name }}</td>

                </tr>
                <tr>
                    <td class="text-bold-500">image</td>
                    <td><div class="img-fluid w-10" ><img class="img-fluid w-10" src="{{ asset( $cat->image ) }}" alt="{{ $cat->name }}"></div></td>

                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection