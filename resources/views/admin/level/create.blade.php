@extends('layouts.app')

@section('title', 'Create Category')
@section('content')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Level</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('level.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Name</label>
                                <input type="text" id="name" class="form-control" placeholder="Name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Category</label>
                                <select id="category_id" class="form-control" name="category_id" required>
                                    @foreach( $cats as $cat )
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">First Image</label>
                                <input type="file" id="image" class="form-control" name="image" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Second Image</label>
                                <input type="file" id="image" class="form-control" name="image2" required>
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