@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

    <div class="page-content">
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                          
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <h6 class="text-muted font-semibold">Categories</h6>
                                <h6 class="font-extrabold mb-0">{{ $categoreis }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                           
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <h6 class="text-muted font-semibold">Players</h6>
                                <h6 class="font-extrabold mb-0">{{ $user_count }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <h6 class="text-muted font-semibold">Levels</h6>
                                <h6 class="font-extrabold mb-0">{{ $levels }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <h6 class="text-muted font-semibold">Challenges</h6>
                                <h6 class="font-extrabold mb-0">{{ $challenges }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
