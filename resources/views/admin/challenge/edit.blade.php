@extends('layouts.app')

@section('title', 'Create Category')
@section('content')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">edit challenge</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('challenge.update', $challenge->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Name</label>
                                <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{ $challenge->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Main Image</label>
                                <input type="file" id="main_image" class="form-control" name="main_image" >
                                <img class="img-fluid w-100" src="{{ asset($challenge->image) }}" alt="{{ $challenge->name }}"></div>

                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Prize</label>
                                <input type="text" id="prize" class="form-control" placeholder="Name" name="prize" value="{{ $challenge->prize }}" required>
                            </div>
                        </div>
                       
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection