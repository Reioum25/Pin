@extends('owner.owner-layouts.app')

@section('content')
<div class="container" style="padding-top: 50px; padding-bottom: 200px;">
    <section class="jumbotron text-center">
            <div class="container">
                    <h1 class="jumbotron-heading">My Commercial Space</h1>
            </div>
    </section>

    <div class="album py-6 bg-light">
        <div class="container">

        <div class="row">

            @if(count($commercialspace) > 0)
            @foreach($commercialspace as $commercialspaces)
                @if($commercialspaces->owner_id == $owner_id)
                    <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    <img class="card-img-top" style="height: 250px" src="/storage/images/{{$commercialspaces->image1}}" alt="Card image cap">
                        <div class="card-body">
                        <blockquote class="blockquote">
                        <h3 class="card-text mb-0">{{$commercialspaces->space_name}}</h3>
                        <footer class="blockquote-footer"><i class="fa fa-map-marker" style="font-size:15px;color:red;"></i> {{$commercialspaces->barangay}}, {{$commercialspaces->street}}</footer>
                        </blockquote>
                        <p class="card-text lead text-primary">&#8369;{{$commercialspaces->price}} <small class="text-muted">/ {{$commercialspaces->type}}</small></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="/home/{{$commercialspaces->id}}/show" class="btn btn-lg btn-outline-dark" role="button">View More</a>
                            <a href="/home/{{$commercialspaces->id}}/edit" class="btn btn-lg btn-outline-dark" role="button">Edit</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                @else
                    
                @endif
            @endforeach
            @else
            
            @endif

        </div>
        </div>
    </div>
</div>
@endsection