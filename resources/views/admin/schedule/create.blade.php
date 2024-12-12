@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME', 'Badminton.io') }} - {{ __('Create Schedule') }}
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/admin/league.css') }}">
    <link href="summernote-bs5.css" rel="stylesheet">
    <link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">
    <!-- Include Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

    <!-- Include jQuery (Summernote depends on it) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Include Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="card card-default">
            <div class="card-header">
                <h5>{{ __('Create Schedule') }}</h5>
            </div>
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ route('schedule.store') }}" enctype="multipart/form-data">
                    @csrf()
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">{{__('Match')}}</label>
                            <input class="form-control" value="{{ old('match') }}" type="text" name="match" id="match" placeholder="{{ __('Enter match ') }}"/>
                            @if ($errors->has('match'))
                                <span class="text-danger">{{ $errors->first('match') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-4">
                            <div class="col-12">
                                <label for="lastName" class="form-label">{{__('Time')}}</label>
                                <input class="form-control" value="{{ old('time') }}" type="time" name="time" id="name" placeholder="{{ __('Enter time') }}"/>
                                @if ($errors->has('time'))
                                    <span class="text-danger">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <label for="lastName" class="form-label">{{__('Date')}}</label>
                                <input class="form-control" value="{{ old('date') }}" type="date" name="date" id="date" placeholder="{{ __('Enter date') }}"/>
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <label for="lastName" class="form-label">{{__('Stadium')}}</label>
                                <input class="form-control" value="{{ old('stadium') }}" type="text" name="stadium" id="stadium" placeholder="{{ __('Enter stadium') }}"/>
                                @if ($errors->has('stadium'))
                                    <span class="text-danger">{{ $errors->first('stadium') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="row mt-4">
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label>{{ __('Logo') }}</label>
                                <div class="">
                                    <div class="" style="display: inline-grid;">
                                        <div class=" choose-avatar">
                                            <div id="btnimage">
                                                <img id="showImage" class="show-avatar" src="{{asset( '/images/logo-hungha.jpeg')}}" alt="avatar">
                                            </div>
                                            <div id="button">
                                                <i id="" class="fas fa-camera"> {{ __('Choose Image: ') }}</i> <i class="text-black"> {{__('(jpeg,png,jpg)')}} </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label for="lastName" class="form-label">{{__('Team Name')}}</label>
                                        <input class="form-control" value="FC Hưng Hà" type="text" name="team1" id="team1" placeholder="{{ __('Enter team name') }}"/>
                                        @if ($errors->has('team1'))
                                            <span class="text-danger">{{ $errors->first('team1') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-6">
                            <div class="form-group">
                                <label>{{ __('Logo  ') }}</label>
                                <div class="">
                                    <div class="" style="display: inline-grid;">
                                        <input value="" type="file" class="border-0 bg-light pl-0" name="logo_team_2" id="image" hidden>
                                        <div class=" choose-avatar">
                                            <div id="btnimage">
                                                <img id="showImage" class="show-avatar" src="{{asset( '/images/team_default.png')}}" alt="avatar">
                                            </div>
                                            <div id="button">
                                                <i id="btn_chooseImg" class="fas fa-camera"> {{ __('Choose Image: ') }}</i> <i class="text-black"> {{__('(jpeg,png,jpg)')}} </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <label for="lastName" class="form-label">{{__('Team Name')}}</label>
                                        <input class="form-control" value="{{ old('team2') }}" type="text" name="team2" id="team2" placeholder="{{ __('Enter video title') }}"/>
                                        @if ($errors->has('team2'))
                                            <span class="text-danger">{{ $errors->first('team2') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success me-2">{{ __('Save') }}</button>
                        <button type="reset" class="btn btn-outline-secondary">{{ __('Reset') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script src="{{ asset('js/eventImage.js') }}"></script>
    <!-- include summernote css/js-->
    <script src="{{ asset('summernote/jquery.min.js') }}"></script>
    <!-- Include Summernote JS -->
    <script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Write your content here...',
                tabsize: 2,
                height: 600
            });
        });
    </script>

@endsection
