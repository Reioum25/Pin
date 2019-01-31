@extends('layouts.app')
@section('content')
@csrf
    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Search</h3>
                        <div class="card-text">
                            <form action="/list/search" class="form">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select class="form-control" name="cat">
                                        <option value="">Any</option>
                                        <option value="For Rent" {{ (old('cat') == 'For Rent') ? "selected='selected'" : "" }}>For Rent</option>
                                        <option value="For Sale" {{ (old('cat') == 'For Sale') ? "selected='selected'" : "" }}>For Sale</option>
                                        <option value="For Lease" {{ (old('cat') == 'For Lease') ? "selected='selected'" : "" }}>For Lease</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label for="">Barangay</label>
                                    <select class="form-control" name="s">

                                        <option value="Any" selected="selected">Anywhere in Zamboanga</option>
                                        <optgroup label="West Coast"></optgroup>
                                        @foreach($barangays->where('district', 1)->sortBy('name') as $barangay)
                                            <option value="{{ $barangay->id }}" {{ (old('s') == $barangay->id) ? "selected='selected'" : "" }}>{{ $barangay->name }}</option>
                                        @endforeach
                                        <optgroup label="East Coast">East Coast</optgroup>
                                        @foreach($barangays->where('district', 2)->sortBy('name') as $barangay)
                                            <option value="{{ $barangay->id }}" {{ (old('s') == $barangay->id) ? "selected='selected'" : "" }}>{{ $barangay->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="">Property Type</label>
                                    <select class="form-control" name="type">
                                        <option value="" selected disabled>Select Property Type</option>
                                        <option value="Commercial Space" {{ (old('type') == 'Commercial Space') ? "selected='selected'" : "" }}>Commercial Space</option>
                                        <option value="Room" {{ (old('type') == 'Room') ? "selected='selected'" : "" }}>Room</option>
                                        <option value="Lot" {{ (old('type') == 'Lot') ? "selected='selected'" : "" }}>Lot</option>
                                        <option value="House" {{ (old('type') == 'House') ? "selected='selected'" : "" }}>House</option>
                                        <option value="House and Lot" {{ (old('type') == 'House and Lot') ? "selected='selected'" : "" }}>House and Lot</option>
                                        <option value="Apartment" {{ (old('type') == 'Apartment') ? "selected='selected'" : "" }}>Apartment</option>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label for="">Minimum price</label>
                                    <select class="form-control" name="min_price">
                                        <option value="" selected disabled>Minimum Price</option>
                                        <option value="1">From Any</option>
                                        <option value="5000">PHP 5,000</option>
                                        <option value="10000">PHP 10,000</option>
                                        <option value="20000">PHP 20,000</option>
                                        <option value="50000">PHP 50,000</option>
                                        <option value="100000">PHP 100,000</option>
                                        <option value="250000">PHP 250,000</option>
                                        <option value="500000">PHP 500,000</option>
                                        <option value="750000">PHP 750,000</option>
                                        <option value="1000000">PHP 1,000,000</option>
                                        <option value="2000000">PHP 2,000,000</option>
                                        <option value="3000000">PHP 3,000,000</option>
                                        <option value="4000000">PHP 4,000,000</option>
                                        <option value="5000000">PHP 5,000,000</option>
                                        <option value="6000000">PHP 6,000,000</option>
                                        <option value="7000000">PHP 7,000,000</option>
                                        <option value="8000000">PHP 8,000,000</option>
                                        <option value="9000000">PHP 9,000,000</option>
                                        <option value="10000000">PHP 10,000,000</option>
                                        <option value="20000000">PHP 20,000,000</option>
                                        <option value="20000001">PHP 20,000,000 +</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Maximum price</label>
                                    <select class="form-control" name="max_price">
                                        <option value="" selected disabled>Maximum Price</option>
                                        <option value="1">To Any</option>
                                        <option value="5000">PHP 5,000</option>
                                        <option value="10000">PHP 10,000</option>
                                        <option value="20000">PHP 20,000</option>
                                        <option value="50000">PHP 50,000</option>
                                        <option value="100000">PHP 100,000</option>
                                        <option value="250000">PHP 250,000</option>
                                        <option value="500000">PHP 500,000</option>
                                        <option value="750000">PHP 750,000</option>
                                        <option value="1000000">PHP 1,000,000</option>
                                        <option value="2000000">PHP 2,000,000</option>
                                        <option value="3000000">PHP 3,000,000</option>
                                        <option value="4000000">PHP 4,000,000</option>
                                        <option value="5000000">PHP 5,000,000</option>
                                        <option value="6000000">PHP 6,000,000</option>
                                        <option value="7000000">PHP 7,000,000</option>
                                        <option value="8000000">PHP 8,000,000</option>
                                        <option value="9000000">PHP 9,000,000</option>
                                        <option value="10000000">PHP 10,000,000</option>
                                        <option value="20000000">PHP 20,000,000</option>
                                        <option value="20000001">PHP 20,000,000+</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <h2 class="mb-4">Search results</h2>
                <div class="container">
                    <div class="row">
                        @if(count($commercialspaces) == 0)
                            <h1 class="title-1 text-muted">No results found.</h1>
                        @endif
                        @foreach($commercialspaces as $commercial_space)
                            <div class="col-md-4 col-sm-12">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" style="height: 250px" src="{{$commercial_space->image1}}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <blockquote class="blockquote">
                                            <h3 class="card-text mb-0">{{$commercial_space->space_name}}</h3>
                                            <footer class="blockquote-footer"><i class="fa fa-map-marker" style="font-size:15px;color:red;"></i>
                                                {{$commercial_space->barangay}}, {{$commercial_space->street}}</footer>
                                        </blockquote>
                                        <div class="card-text lead text-primary mb-0 pb-0">
                                            &#8369;
                                            {{$commercial_space->price}}
                                            <small class="text-muted">
                                                @if($commercial_space->p_type != 'House and Lot')
                                                    / {{$commercial_space->type}}
                                                @endif
                                            </small>
                                        </div>
                                        <p class="mt-0 pt-0">
                                            <span class="badge badge-primary">{{$commercial_space->p_type}}</span>
                                            <span class="badge badge-secondary">{{$commercial_space->p_category}}</span>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="/list/{{$commercial_space->id}}/show" class="btn btn-outline-dark btn-block"
                                                    role="button">View
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12">
                            <div class="form-group">
                                {{ $commercialspaces->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection