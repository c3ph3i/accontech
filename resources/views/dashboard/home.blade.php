@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">List</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                <button data-toggle="modal" data-target="#addNewPlace" class="btn btn-success pull-right home-container-top-create">Add</button>

                                @if (\Session::has('success_msg'))
                                        <div class="alert alert-success pull-left">
                                            <p>{{ \Session::get('success_msg') }}</p>
                                        </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if(!empty($list))
                                    <table class="table table-hover" id="placesListTable">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Visited</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list as $place)
                                            <tr data-place-id="{{ $place['id'] }}">
                                                <td>{{ $place['title'] }}</td>
                                                <td>{{ $place['description'] }}</td>
                                                <td>{{ $place['country'] }}</td>
                                                <td>{{ $place['city'] }}</td>
                                                <td>{{ $place['address'] }}</td>
                                                <td>{{ $place['latitude'] }}</td>
                                                <td>{{ $place['longitude'] }}</td>
                                                <td><input type="checkbox" name="visited" class="place-visited-checkbox" @if( $place['visited']  == '1') checked @endif)></td>
                                                <td>
                                                    <button  class="btn btn-sm  btn-info" onclick="location.href='/places/{{ $place['id'] }}'">Open</button>
                                                    <button  class="btn btn-sm  btn-danger" onclick="if(confirm('Are you sure?\nEither OK or Cancel.'))$(this).parent().find('form').submit()">Delete</button>
                                                    <form action="{{action('PlacesController@destroy', $place['id'])}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert container-fluid alert-info">
                                        <span class="pull-left">Your list is empty. Add your first place.</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button data-toggle="modal" data-target="#addNewPlace" class="btn btn-success pull-right">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div id="addNewPlace" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add new place</h4>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <script>
                            jQuery("#addNewPlace").modal('show');
                        </script>
                    @endif

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <form action="{{ url('places') }}" id="placeForm" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" @if($errors->has('title')) style="border-color: red" @endif class="form-control" id="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description" value="{{ old('description') }}">
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" name="country" class="form-control" id="country" value="{{ old('country') }}">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control" id="city" value="{{ old('city') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="number" step="0.00001" @if($errors->has('latitude')) style="border-color: red" @endif name="latitude" class="form-control coordinates" id="latitude" value="{{ old('latitude') }}">
                            </div>

                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="number" step="0.00001" @if($errors->has('longitude')) style="border-color: red" @endif name="longitude" class="form-control coordinates" id="longitude" value="{{ old('longitude') }}">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" name="visited" class="form-check-input" id="visited" @if( old('visited') ) checked @endif>
                                <label class="form-check-label" for="visited" >Visited</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 map-wrapper">
                        <div id="map" style="width: 100%;height: 500px;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success pull-left" id="placeFormSubmit">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    @include('layouts.gmap_init')


@stop
