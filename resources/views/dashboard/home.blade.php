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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if(!empty($list))
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list as $place)
                                            <tr>
                                                <td>{{ $place['title'] }}</td>
                                                <td>{{ $place['description'] }}</td>
                                                <td>{{ $place['country'] }}</td>
                                                <td>{{ $place['city'] }}</td>
                                                <td>{{ $place['address'] }}</td>
                                                <td>{{ $place['latitude'] }}</td>
                                                <td>{{ $place['longitude'] }}</td>
                                                <td>edit</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert container-fluid alert-info">
                                        <span class="pull-left">Your list is empty. Create your first place.</span>
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <form action="{{ route('add_new_location') }}" method="post">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description">
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" name="country" class="form-control" id="country">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control" id="city">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address">
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="latitude">
                            </div>

                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="longitude">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" name="visited" class="form-check-input" id="visited">
                                <label class="form-check-label" for="visited">Visited</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 map-wrapper">
                        <div id="map" style="width: 100%;height: 500px;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    @include('layouts.gmap_init')


@stop
