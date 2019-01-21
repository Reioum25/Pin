@extends('admin.admin-layouts.app')

@section('content')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap&libraries=places"></script>
<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">{{ __('Register Commercial Space') }}</div>
    
                    <div class="card-body">
                        {!! Form::open(['action' => 'CommercialSpaceController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group font-weight-bold">
                            {{Form::label('namespace', 'Commercial Space Name')}}
                            {{Form::text('namespace', '', ['class' => 'form-control', 'placeholder' => 'Enter Space Name', 'required'])}} 
                        </div>
                        <div class="form-group font-weight-bold">
                            {{Form::label('aboutspace', 'About the Space')}}
                            {{Form::textarea('aboutspace', '', ['class' => 'form-control', 'rows' =>'3', 'placeholder' => 'Description', 'required'])}}
                        </div>
                        <div class="form-row">
                            <div class="form-group font-weight-bold col-md-6">
                                {{Form::label('sqm', 'Square Meter')}}
                                {{Form::text('sqm', '', ['class' => 'form-control', 'placeholder' => 'sqm', 'required'])}}
                            </div>
                            <div class="form-group font-weight-bold col-md-6">
                                {{Form::label('cr', 'Bathroom/s')}}
                                {{Form::text('cr', '', ['class' => 'form-control', 'placeholder' => 'Number of bathroom', 'required'])}}
                            </div>
                        </div>
                        <div class="form-group font-weight-bold">
                            {{Form::label('location', 'Location (Zamboanga City)')}}
                            <div class="form-inline">
                                {{Form::select('barangay', [ 
                                'Ayala' => 'Ayala', 
                                'Boalan' => 'Boalan', 
                                'Camino Nuevo' => 'Camino Nuevo', 
                                'Canelar' => 'Canelar', 
                                'Divisoria' => 'Divisoria', 
                                'Guiwan' => 'Guiwan', 
                                'Mercedes' => 'Mercedes', 
                                'Pasonanca' => 'Pasonanca',
                                'Pueblo' => 'Pueblo',
                                'Putik' => 'Putik',
                                'Recodo' => 'Recodo',
                                'San Roque' => 'San Roque',
                                'San Jose Gusu' => 'San Jose Gusu',
                                'Sta. Barbara' => 'Sta. Barbara',
                                'Sta. Catalina' => 'Sta. Catalina',
                                'Sta. Maria' => 'Sta. Maria',
                                'Suterville' => 'Suterville',
                                'Talon-Talon' => 'Talon-Talon', 
                                'Tetuan' => 'Tetuan',
                                'Tugbungan' => 'Tugbungan',
                                'Zambowood' => 'Zambowood'], null, ['class' => 'form-control col-md-6']) }}
                                {{Form::text('street', '', ['class' => 'form-control col-md-6', 'placeholder' => 'Street/Drive', 'required'])}}
                            </div>
                        </div>
                        <div class="form-group font-weight-bold">
                            {{Form::label('searchmap', 'Map')}}
                            {{Form::text('searchmap', '', ['class' => 'form-control', 'placeholder' => 'Search Location'])}}
                            <div style="width: 100%; height: 250px;" id="map"></div>
                            <small>*Drag the marker to point location</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group font-weight-bold col-md-6">
                                {{Form::label('lat', 'Latitude')}}
                                {{Form::text('lat', '', ['class' => 'form-control', 'readonly', 'required'])}}
                            </div>
                            <div class="form-group font-weight-bold col-md-6">
                                {{Form::label('lng', 'Longitude')}}
                                {{Form::text('lng', '', ['class' => 'form-control', 'readonly', 'required'])}}
                            </div>
                        </div>
                        <div class="form-group font-weight-bold">
                            {{Form::label('aboutarea', 'About the Area')}}
                            {{Form::textarea('aboutarea', '', ['class' => 'form-control', 'rows' =>'3', 'placeholder' => 'Description', 'required'])}}
                        </div>
                        <div class="form-group font-weight-bold">
                            {{Form::label('name', 'Owner Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'required'])}}
                        </div>
                        <div class="form-group font-weight-bold">
                            {{Form::label('email', 'Email')}}
                            {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'email@gmail.com', 'required'])}}
                        </div>
                        <div class="form-row">
                            <div class="form-group font-weight-bold col-md-6">
                                {{Form::label('mobile', 'Mobile No.')}}
                                {{Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => '09XXXXXXXXX', 'required'])}}
                            </div>
                            <div class="form-group font-weight-bold col-md-6">
                                {{Form::label('tel', 'Tel No.')}}
                                {{Form::text('tel', '', ['class' => 'form-control', 'placeholder' => '062-XXX-XXXX', 'required'])}}
                            </div>
                        </div>
                        <div class="form-group font-weight-bold">
                            {{Form::label('pay', 'Payment')}}
                            <div class="form-inline">
                                {{Form::text('price', '', ['class' => 'form-control col-md-4', 'placeholder' => 'Price', 'required'])}}
                                {{Form::select('type', [ 
                                'monthly' => 'Monthly', 
                                'annual' => 'Annual'], null, ['class' => 'form-control col-md-4']) }}
                                {{Form::select('status', [ 
                                'Available' => 'Available', 
                                'Unavailable' => 'Unavailable'], null, ['class' => 'form-control col-md-4',  'placeholder' => 'Status', 'required']) }}
                            </div>
                        </div>
                        <div class="form-group font-weight-bold">
                            {{Form::label('image', 'Images')}}
                            {{Form::file('image1', ['class' => 'form-control'])}}
                            {{Form::file('image2', ['class' => 'form-control'])}}
                            {{Form::file('image3', ['class' => 'form-control'])}}
                        </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
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
            draggable: true
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

        google.maps.event.addListener(marker, 'position_changed', function(){

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    }



</script>

@endsection