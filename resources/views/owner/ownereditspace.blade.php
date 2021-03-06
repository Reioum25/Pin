@extends('owner.owner-layouts.app')

@section('content')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap&libraries=places"></script>
<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header font-weight-bold">{{ __('Edit Property Details') }}</div>
        
                        <div class="card-body">
                            {!! Form::open(['action' => ['CommercialSpaceController@update', $commercialspace->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


                                <!--  PROPERTY CATEGORY -->
                             <div class="form-row">
                               <div class="form-group font-weight-bold col-md-6">
                                    {{Form::label('Property_category', 'Property Category')}}
                                        {{Form::select('Property_category', [ 
                                        'For Rent' => 'For Rent',                              
                                        'For Sale' => 'For Sale',
                                        'For Lease' => 'For Lease'],  $commercialspace->p_category,
                                        ['class' => 'form-control col-md-6']) }}
                               </div>

                                 <!--  PROPERTY TYPE -->
                               <div class="form-group font-weight-bold col-md-6">
                                        {{Form::label('Property_type', 'Property Type')}}
                                        {{Form::select('Property_type', [ 
                                        'Commercial Space' => 'Commercial Space',                              
                                        'Room' => 'Room',
                                        'Lot' => 'Lot',
                                        'House' => 'House',
                                        'House and Lot' => 'House and Lot',
                                        'Apartment' => 'Apartment'],  $commercialspace->p_type,
                                        ['class' => 'form-control col-md-6']) }}
                                </div>
                            </div>


                            <!--  PROPERTY NAME -->

                            <div class="form-group font-weight-bold">
                                {{Form::label('namespace', 'Property Name')}}
                                {{Form::text('namespace', $commercialspace->space_name, ['class' => 'form-control', 'placeholder' => 'Enter Property Name', 'required'])}} 
                            </div>

                             <!--  ABOUT THE PROPERTY -->
                            <div class="form-group font-weight-bold">
                                {{Form::label('aboutspace', 'About the Property')}}
                                {{Form::textarea('aboutspace', $commercialspace->about_space, ['class' => 'form-control', 'rows' =>'3', 'placeholder' => 'Description', 'required'])}}
                            </div>

                            <!--   PROPERTY SIZE -->
                            <div class="form-row">
                                <div class="form-group font-weight-bold col-md-6">
                                    {{Form::label('sqm', 'Square Meter')}}
                                    {{Form::text('sqm', $commercialspace->sqm, ['class' => 'form-control', 'placeholder' => 'sqm', 'required'])}}
                                </div>

                                 <!--   PROPERTY BATHROOM -->
                                <div class="form-group font-weight-bold col-md-6">
                                    {{Form::label('cr', 'Bathroom/s')}}
                                    {{Form::text('cr', $commercialspace->cr, ['class' => 'form-control', 'placeholder' => 'Number of bathroom', 'required'])}}
                                </div>
                            </div>

                              <!-- PROPERTY BARANGAY LOCATION -->
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
                                    'Zambowood' => 'Zambowood'], $commercialspace->barangay,
                                     ['class' => 'form-control col-md-6', 'placeholder' => 'Select Barangay...', 'required']) }}

                                <!--   PROPERTY STREET -->
                                    {{Form::text('street', $commercialspace->street, ['class' => 'form-control col-md-6', 'placeholder' => 'Street/Drive', 'required'])}}

                                </div>
                            </div>
                            <div class="form-group">
                                <div style="width: 100%; height: 150px;" id="map"></div>
                            </div>

                            
                            <div class="form-row">
                                <div class="form-group font-weight-bold col-md-6">
                                    {{Form::label('lat', 'Latitude')}}
                                    {{Form::text('lat', $commercialspace->latitude, ['class' => 'form-control', 'readonly', 'required'])}}
                                </div>
                                <div class="form-group font-weight-bold col-md-6">
                                    {{Form::label('lng', 'Longitude')}}
                                    {{Form::text('lng', $commercialspace->longitude, ['class' => 'form-control', 'readonly', 'required'])}}
                                </div>
                            </div>
                            <div class="form-group font-weight-bold">
                                {{Form::label('aboutarea', 'About the Area')}}
                                {{Form::textarea('aboutarea', $commercialspace->about_area, ['class' => 'form-control', 'rows' =>'3', 'placeholder' => 'Description', 'required'])}}
                            </div>
                            <div class="form-group font-weight-bold">
                                {{Form::label('name', 'Owner Name')}}
                                {{Form::text('name', $commercialspace->owner_name, ['class' => 'form-control', 'placeholder' => 'Name', 'required'])}}
                            </div>
                            <div class="form-group font-weight-bold">
                                {{Form::label('email', 'Email')}}
                                {{Form::email('email', $commercialspace->email, ['class' => 'form-control', 'placeholder' => 'email@gmail.com', 'required'])}}
                            </div>
                            <div class="form-row">
                                <div class="form-group font-weight-bold col-md-6">
                                    {{Form::label('mobile', 'Mobile No.')}}
                                    {{Form::text('mobile', $commercialspace->mobile_no, ['class' => 'form-control', 'placeholder' => '09XXXXXXXXX', 'required'])}}
                                </div>
                                <div class="form-group font-weight-bold col-md-6">
                                    {{Form::label('tel', 'Tel No.')}}
                                    {{Form::text('tel', $commercialspace->tel_no, ['class' => 'form-control', 'placeholder' => '062-XXX-XXXX', 'required'])}}
                                </div>
                            </div>
                            <div class="form-group font-weight-bold">
                                {{Form::label('pay', 'Payment')}}
                                <div class="form-inline">
                                    {{Form::text('price', $commercialspace->price, ['class' => 'form-control col-md-4', 'placeholder' => 'Price', 'required'])}}
                                    {{Form::select('type', [ 
                                    'monthly' => 'Monthly', 
                                    'annual' => 'Annual'], $commercialspace->type, ['class' => 'form-control col-md-4']) }}
                                    {{Form::select('status', [ 
                                    'Available' => 'Available', 
                                    'Unavailable' => 'Unavailable'], $commercialspace->status, ['class' => 'form-control col-md-4',  'placeholder' => 'Status', 'required']) }}
                                </div>
                            </div>
                            <div class="form-group font-weight-bold">
                                {{Form::label('image', 'Images')}}
                                {{Form::file('image1', ['class' => 'form-control'])}}
                                {{Form::file('image2', ['class' => 'form-control'])}}
                                {{Form::file('image3', ['class' => 'form-control'])}}
                            </div>
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
    <script>

    function initMap()
    {
        var myLatlng = new google.maps.LatLng($('#lat').val(),$('#lng').val());
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