
@extends('layouts.page')
@section('content')
    <div class="container " style="background-color: white">
        <div class="row">
            <div class=" title">
                <h3 class="">
                    <i class="fa fa-user"></i>
                    Thông tin tài khoản </h3>
            </div>
            <hr>
            <form method="POST" action="{{route('profile.update', $dataUser['id'])}}" enctype="multipart/form-data">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success" style="color: green; font-size: 20px;" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row" style="padding: 10px">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">{{ __('Tên') }}</label>
                            <input type="text" value="{{ $dataUser->name }}" name="name" class="form-control" placeholder="name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div>
                                <label for="img">{{ __('Ảnh đại diện') }}</label>
                                <input value="" type="file" class="border-0 bg-light pl-0" name="image" id="image" style="display: none">
                                <div class=" choose-avatar">
                                    <div id="btnimage">
                                        <img id="showImage" style="width: 110px" class="show-avatar" src="/{{ $dataUser->image ?? asset('/images/default-avatar.png') }}" alt="avatar">
                                    </div>
                                    <div id="button" style="margin-top: 10px;">
                                        <i id="btn_chooseImg" class="fa fa-camera"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="name">{{ __('Hòm thư') }}</label>
                        <input type="text" value="{{ $dataUser->email }}" name="email" class="form-control" placeholder="name" disabled>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddress" class="form-label">{{ __('Số điện thoại') }}</label>
                        <input name="phone" value="{{ old('phone', $dataUser->phone) }}" type="text" class="form-control ">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-6 " style="margin-top: 10px">
                        <label for="inputCity" class="form-label">{{ __('Địa chỉ') }}</label>
                        <input name="address" type="text" value="{{ old('address', $dataUser->address) }}" class="form-control ">
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-6 mt-2" style="margin-top: 10px">
                        <label for="inputCity" class="form-label">{{ __('Tuổi') }}</label>
                        <input name="age" type="date" value="{{ old('age', $dataUser->age) }}" class="form-control ">
                        @if ($errors->has('age'))
                            <span class="text-danger">{{ $errors->first('age') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4" style="padding: 0;margin-top: 15px;margin-left: 15px;">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Lưu') }}
                        </button>
                    </div>
                </div>
                <div>
                    <a href="{{route('change-password')}}">
                        <h3> {{ __('Thay đổi mật khẩu') }}</h3>
                    </a>
                </div>
            </form>
        </div>
    </div>
@section('js')
    <script src="{{ asset('js/tournament.js') }}"></script>
@endsection
@endsection
