@extends('layouts.app')

@section('content')
@csrf
<div class="container" style="padding-top: 50px; padding-bottom: 200px;">
    <section class="jumbotron text-center">
        <h1 class="title-1">
            @if($request->has('cat') && !is_null($request->cat))
                {{ $request->cat }}
            @endif
        </h1>
        <h4 class="title-4">{{ $s }}</h4>
        <div class="container">
            <form class="form-inline" action="/list/search" method="GET">
                <select class="form-control col-md-10 font-weight-bold" name="s">
                    <option value="Ayala">Ayala</option>
                    <option value="Boalan">Boalan</option>
                    <option value="Camino Nuevo">Camino Nuevo</option>
                    <option value="Canelar">Canelar</option>
                    <option value="Divisoria">Divisoria</option>
                    <option value="Guiwan">Guiwan</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Pasonanca">Pasonanca</option>
                    <option value="Pueblo" selected>Pueblo</option>
                    <option value="Putik">Putik</option>
                    <option value="Recodo">Recodo</option>
                    <option value="San Roque">San Roque</option>
                    <option value="San Jose Gusu">San Jose Gusu</option>
                    <option value="Sta. Barbara">Sta. Barbara</option>
                    <option value="Sta. Catalina">Sta. Catalina</option>
                    <option value="Sta. Maria">Sta. Maria</option>
                    <option value="Suterville">Suterville</option>
                    <option value="Talon-Talon">Talon-Talon</option>
                    <option value="Tetuan">Tetuan</option>
                    <option value="Tugbungan">Tugbungan</option>
                    <option value="Zambowood">Zambowood</option>
                </select>
                <button type="submit" class="btn btn-dark col-md-2">Search</button>
            </form>
        </div>
    </section>

    <div class="album py-6 bg-light">
        <div class="container">
            <div class="row">
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
                                <p class="text-secondary mt-0 pt-0">
                                    {{$commercial_space->p_type}}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/list/{{$commercial_space->id}}/show" class="btn btn-lg btn-outline-dark"
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
@endsection