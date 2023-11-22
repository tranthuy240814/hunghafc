@extends('layout.admin_layout')
@section('content')
    <div class="container-fluid mt-4">
        <div class="card card-default">
            <div class="card-header" style="background-color: grey">
                <h5>{{__('Edit league')}}</h5>
            </div>
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ route('league.update',$dataLeague['id']) }}" enctype="multipart/form-data">
                    @csrf()
                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <div class="form-group">
                                <label>{{__('Logo league')}}</label>
                                <div class="">
                                    <div class="" style="display: inline-grid;">
                                        <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" hidden>
                                        <div class=" choose-avatar" >
                                            <div id="btnimage">
                                                <img id="showImage" class="show-avatar" src="{{$dataLeague->image ?? asset('/images/champion.png') }}" alt="avatar" style="width: 200px; margin-left: 40px">
                                            </div>
                                            <div id="button" >
                                                <i id="btn_chooseImg" class="fas fa-camera">  {{__('Choose Image')}}</i>
                                            </div>
                                        </div>
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="row mt-4">
                                <div class="col-6">
                                    <label for="lastName" class="form-label">{{__('Name')}}</label>
                                    <input class="form-control" value="{{$dataLeague->name}}" type="text" name="name" id="name"  />
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label for="lastName" class="form-label">{{__('Slug')}}</label>
                                    <input class="form-control" value="{{$dataLeague->slug}}" type="text" name="slug" id="slug"  />
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="address" class="form-label">{{__('Start date')}}</label>
                                        <input type="date" value="{{$dataLeague->start_date}}" class="form-control" id="start_date" name="start_date" placeholder="Address" />
                                        @if ($errors->has('start_date'))
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="address" class="form-label">{{__('End date')}}</label>
                                        <input type="date" value="{{$dataLeague->end_date}}" class="form-control"  id="end_date" name="end_date" placeholder="Address" />
                                        @if ($errors->has('end_date'))
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="lastName" class="form-label">{{__('Number of athletes')}}</label>
                                <input class="form-control" value="{{$dataLeague->number_of_athletes}}" type="text" name="number_of_athletes" id="number_of_athletes"  />
                                @if ($errors->has('number_of_athletes'))
                                    <span class="text-danger">{{ $errors->first('number_of_athletes') }}</span>
                                @endif
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label">{{__('Location')}}</label>
                                        <input class="form-control" value="{{$dataLeague->location}}" type="text" name="location" id="location"  />
                                        @if ($errors->has('location'))
                                            <span class="text-danger">{{ $errors->first('location') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label">{{__('Prize money')}}</label>
                                        <input class="form-control" value="{{$dataLeague->money}}" type="number" name="money" id="money"  />
                                        @if ($errors->has('money'))
                                            <span class="text-danger">{{ $errors->first('money') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>{{__('Format of league')}}</label>
                                        <select id="format_of_league" value="{{$dataLeague->format_of_league}}" name="format_of_league" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                            @foreach($format_tours as $format_tour => $value)
                                                <option id="format_of_league" value="{{$value}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>{{__('Type of league')}}</label>
                                        <select  id="type_of_league" value="{{$dataLeague->type_of_league}}" name="type_of_league" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                            @foreach($type_tours as $type_tour => $value)
                                                <option id="type_of_league" value="{{$value}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">{{__('Save')}}</button>
                        <button type="reset" class="btn btn-outline-secondary">{{__('Cancel')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
    <script src="{{ asset('js/eventImage.js') }}"></script>
@endsection

