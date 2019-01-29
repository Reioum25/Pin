@extends('layouts.app')

@section('content')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap&libraries=places"></script>

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" style="height: 550px; opacity: 0.6;" src="/images/ZamboangaCity.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" style="height: 550px ; opacity: 0.6;" src="/images/home2.jpg" alt="Second slide">
      </div>
      <div class="container" style="position:absolute; left:8%; top:70%; width:100%;">
        <div class="carousel-caption">
          <h2>Find Potential Property here in Zamboanga</h2>
          <br>
          <form class="" action="/list/search" method="GET">  

            <div class="row">        
              <select class="form-control col-md-4 font-weight-bold" name="cat">
                <option value="">Any</option>
                <option value="For Rent">For Rent</option>
                <option value="For Sale">For Sale</option>
                <option value="For Lease">For Lease</option>
              </select>  

              <select class="form-control col-md-8  font-weight-bold" name="s">
                  <option value="Any" selected="selected">Anywhere in Zamboanga</option>
                  <optgroup label="West Coast"></optgroup>
                  @foreach($barangays->where('district', 1)->sortBy('name') as $barangay)
                    <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                  @endforeach
                  <optgroup label="East Coast">East Coast</optgroup>
                  @foreach($barangays->where('district', 2)->sortBy('name') as $barangay)
                    <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                  @endforeach
              </select>
            </div>

          <div class="row">
                  <select class="form-control col-md-4 font-weight-bold" name="type">
                    <option value="" selected disabled>Select Property Type</option>
                    <option value="Commercial Space">Commercial Space</option>
                    <option value="Room">Room</option>  
                    <option value="Lot">Lot</option>
                    <option value="House">House</option>
                    <option value="House and Lot">House and Lot</option>
                    <option value="Apartment">Apartment</option>
                  </select> 


                  <select class="form-control col-md-4 font-weight-bold" name="min_price">
                    <option value="null" selected disabled>Minimum Price</option>
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

                  <select class="form-control col-md-4 font-weight-bold" name="max_price">
                    <option value="null" selected disabled>Maximum Price</option>
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
             <br>             
                <button type="submit" class="col-md-12">SEARCH</button>
          </form>
        </div>
      </div>
    </div>
</div>

<div>
<div class="card text-center">
    <div class="card-header">
      <h4>Map</h4>
    </div>
    <div class="card-body">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="searchmap" placeholder="Search Location">
        </div>
        <div style="width: 100%; height: 300px;" id="map"></div>
    </div>
  </div>
</div>

<section class="jumbotron text-center">
  <!-- Modal -->
  
    <div class="container">
      <h1 class="jumbotron-heading">FIND YOUR IDEAL PROPERTY</h1>
      <p class="lead text-muted">Everyone has their own wish-list of elements that make up their ideal property. From transport links to the number of bedrooms, we have a selection of properties to choose from. If you find a property that you like we can arrange a viewing. When you have a viewing try and picture yourself living there, you’ll be making a commitment to the home you buy so make sure that it fills all of your requirements!</p>
    </div>
</section>

<div class="container" style="padding-bottom: 100px;">
<div class="album py-6 bg-light">
    <div class="container">

      <div class="row">

        @if(count($commercialspace) > 0)
          @foreach($commercialspace as $commercialspaces)
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
                        <a href="/list/{{$commercialspaces->id}}/show" class="btn btn-lg btn-outline-dark" role="button">View More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        @else
          
        @endif

      </div>
    </div>
  </div>
</div>

  <script>
    
    function initMap()
    {
        var myLatlng = new google.maps.LatLng(6.913594,122.061373);
        var mapOptions =
        {
            zoom: 18,
            center: myLatlng,
            scrollwheel:false
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
  
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: false
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

        google.maps.event.addListener(searchBox,'places_changed',function(){
            
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;

            for(i=0; place=places[i]; i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);

            }

            map.fitBounds(bounds);
            map.setZoom(18);

        });

        
    }
  </script>
  
@endsection
