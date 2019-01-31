@extends('admin.admin-layouts.app')

@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap&libraries=places"></script>
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
<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
    <div class="row justify-content-center">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">{{ __('List Your Property') }}</div>
    
                    <div class="card-body">
                        {{-- {!! Form::open(['action' => 'CommercialSpaceController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
                        <form action="/home/createspace" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <!--  PROPERTY CATEGORY -->
                               <div class="form-group font-weight-bold col-md-6">
                                    <label for="">Property Category</label>
                                    <select name="Property_category" id="property-cat" class="form-control">
                                        <option value="For Rent">For Rent</option>
                                        <option value="For Sale">For Sale</option>
                                        <option value="For Lease">For Lease</option>
                                    </select>
                               </div>
                                <!--  PROPERTY TYPE -->
                                
                                <!-- ALL
                                    <div class="form-group font-weight-bold col-md-6">
                                        <label for="">Property Type</label>
                                        <select name="Property_type" id="property-type" class="form-control">
                                            <option value="Commercial Space">Commercial Space</option>
                                            <option value="Room">Room</option>
                                            <option value="Lot">Lot</option>
                                            <option value="House">House</option>
                                            <option value="House and Lot">House and Lot</option>
                                            <option value="Apartment">Apartment</option>
                                        </select>
                                    </div>
                                -->

                                <!-- FOR RENT ONLY -->
                                <div class="form-group font-weight-bold col-md-6" id="prp-type-rent">
                                   <label for="">Property Type</label>
                                   <select name="property_type-rent" id="property-type-rent" class="form-control">
                                       <option value="Commercial Space">Commercial Space</option>
                                       <option value="Room">Room</option>
                                       <option value="House">House</option>
                                       <option value="Apartment">Apartment</option>
                                   </select>
                                </div>
                                <!-- FOR SALE ONLY -->
                                <div class="form-group font-weight-bold col-md-6 d-none" id="prp-type-sale">
                                   <label for="">Property Type</label>
                                   <select name="property_type-sale" id="property-type-sale" class="form-control">
                                       <option value="Lot">Lot</option>
                                       <option value="House">House</option>
                                       <option value="House and Lot">House and Lot</option>
                                       <option value="Apartment">Apartment</option>
                                   </select>
                                </div>
                                <!-- FOR LEASE -->
                               <div class="form-group font-weight-bold col-md-6 d-none" id="prp-type-lease">
                                    <label for="">Property Type</label>
                                    <select name="property_type-lease" id="property-type-lease" class="form-control">
                                        <option value="Commercial Space">Commercial Space</option>
                                        <option value="Lot">Lot</option>
                                    </select>
                                </div>
                                
                            </div>

                       <!--  PROPERTY NAME -->

                        <div class="form-group font-weight-bold">
                            {{Form::label('namespace', 'Property Name')}}
                            {{Form::text('namespace', '', ['class' => 'form-control', 'placeholder' => 'Enter Property Name', 'required'])}} 
                        </div>

                       <!--  ABOUT THE PROPERTY -->
                        <div class="form-group font-weight-bold">
                            {{Form::label('aboutspace', 'About the Property')}}
                            {{Form::textarea('aboutspace', '', ['class' => 'form-control', 'rows' =>'3', 'placeholder' => 'Description', 'required'])}}
                        </div>

                          <!--   SIZE AND BATHROOM -->
                        <div class="form-row">
                            <div class="form-group font-weight-bold col-md-6">
                                {{Form::label('sqm', 'Area (Square Meter)')}}
                                {{Form::text('sqm', '', ['class' => 'form-control', 'placeholder' => 'sqm', 'required'])}}
                            </div>
                            <div class="form-group font-weight-bold col-md-6">
                                {{Form::label('cr', 'Bathroom/s')}}
                                {{Form::text('cr', '', ['class' => 'form-control', 'placeholder' => 'Number of bathroom', 'required'])}}
                            </div>
                        </div>

                        <!--  QUANITY OF PROPERTY TO SAVE -->
                        <div class="form-group font-weight-bold">
                            <label for="">Quantity</label>
                            <input type="number" name="qty" id="qty" placeholder="# of properties to save" class="form-control" min="1" required>
                        </div> 

                            <!-- LOCATION -->
                        <div class="form-group font-weight-bold">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="">Location (in Zamboanga City)</label>
                                    <select class="form-control" name="s">
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
                                <div class="col-md-6 col-sm-12">
                                    <label for="">Street/Drive</label>
                                    <input type="text" class="form-control" name="street" placeholder="Street/Drive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            
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
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name to Display', 'required'])}}
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
                        {{Form::submit('Submit', ['class' => 'btn btn-primary', 'col-md-6'])}}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>initMap()</script>
<script>
    $("#property-cat").change(function (){
        $("#prp-type-rent").removeClass('d-none');
        $("#prp-type-sale").removeClass('d-none');
        $("#prp-type-lease").removeClass('d-none');

        if($("#property-cat").val() === 'For Rent')
        {
            $("#prp-type-rent").removeClass('d-none');
            $("#prp-type-sale").addClass('d-none');
            $("#prp-type-lease").addClass('d-none');
        }
        else if($("#property-cat").val() === 'For Sale')
        {
            $("#prp-type-sale").removeClass('d-none');
            $("#prp-type-rent").addClass('d-none');
            $("#prp-type-lease").addClass('d-none');
        }
        else if($("#property-cat").val() === 'For Lease')
        {
            $("#prp-type-lease").removeClass('d-none');
            $("#prp-type-rent").addClass('d-none');
            $("#prp-type-sale").addClass('d-none');
        }
    });

    $("#property-type-rent").change(function (){
        if($("#property-type-rent").val() === 'Lot' || $("#property-type-rent").val() === 'House and Lot' || $("#property-type-rent").val() === 'Apartment' || $("#property-type-rent").val() === 'House'){
            $("#qty").val(1);
            $("#qty").prop('disabled', true);
        }
        else
        {
            $("#qty").prop('disabled', false);
        }
    });
    $("#property-type-sale").change(function (){
        if($("#property-type-sale").val() === 'Lot' || $("#property-type-sale").val() === 'House and Lot' || $("#property-type-sale").val() === 'Apartment' || $("#property-type-sale").val() === 'House'){
            $("#qty").val(1);
            $("#qty").prop('disabled', true);
        }
        else
        {
            $("#qty").prop('disabled', false);
        }
    });
    $("#property-type-lease").change(function (){
        if($("#property-type-lease").val() === 'Lot' || $("#property-type-lease").val() === 'House and Lot' || $("#property-type-lease").val() === 'Apartment' || $("#property-type-lease").val() === 'House'){
            $("#qty").val(1);
            $("#qty").prop('disabled', true);
        }
        else
        {
            $("#qty").prop('disabled', false);
        }
    });
    


</script>

@endsection