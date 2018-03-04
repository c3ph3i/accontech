@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $place->title }}</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (\Session::has('success_msg'))
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <p>{{ \Session::get('success_msg') }}</p>
                                        </div>
                                    </div>
                                @endif
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
                                @endif
                                <div class="col-md-12 place-page-top-buttons-wrapper">
                                    <button type="button" class="btn btn-success pull-right" onclick="jQuery('#placeForm').submit()">Update</button>
                                    <button type="button" class="btn btn-danger pull-right remove-button" onclick="if(confirm('Are you sure?\nEither OK or Cancel.'))$(this).parent().find('form').submit()">Delete</button>
                                    <form action="{{action('PlacesController@destroy', $id)}}" method="post">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                    </form>
                                    <button type="button" class="btn btn-info pull-left" onclick="window.location='{{ route('home') }}'">Back to the list</button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                    <form action="{{ route('places.update',$id) }}" id="placeForm" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" @if($errors->has('title')) style="border-color: red" @endif class="form-control" id="title" value="{{ $place->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" class="form-control" id="description" value="{{ $place->description }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" name="country" class="form-control" id="country" value="{{ $place->country }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control" id="city" value="{{ $place->city }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" id="address" value="{{ $place->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="number" step="0.00001" @if($errors->has('latitude')) style="border-color: red" @endif name="latitude" class="form-control coordinates" id="latitude" value="{{ $place->latitude }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="number" step="0.00001" @if($errors->has('longitude')) style="border-color: red" @endif name="longitude" class="form-control coordinates" id="longitude" value="{{ $place->longitude }}">
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" name="visited" class="form-check-input" id="visited" @if( $place->visited == '1' ) checked @endif>
                                            <label class="form-check-label" for="visited" >Visited</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 map-wrapper">
                                    <div id="map" style="width: 100%;height: 500px;"></div>
                                </div>

                                <div class="col-md-12 place-page-bottom-buttons-wrapper">
                                    <button type="button" class="btn btn-success pull-right" onclick="jQuery('#placeForm').submit()">Update</button>
                                    <button type="button" class="btn btn-danger pull-right remove-button" onclick="if(confirm('Are you sure?\nEither OK or Cancel.'))$(this).parent().find('form').submit()">Delete</button>
                                    <form action="{{action('PlacesController@destroy', $id)}}" method="post">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                    </form>
                                    <button type="button" class="btn btn-info pull-left" onclick="window.location='{{ route('home') }}'">Back to the list</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Google map and additional scripts layout--}}
    @include('layouts.gmap_init')
@stop
