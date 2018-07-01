@extends('website.master') 
@section('title') __:: Register ::__
@endsection
 
@section('main-content')
<div class="container-fluid bg-login">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card card-default">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="User Name" class="col-md-4 col-form-label text-md-right">User Name</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}"
                                    required autofocus> @if ($errors->has('user_name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"
                                    required autofocus> @if ($errors->has('phone'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required> @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required> @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button_btn_back">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    <a class="d-flex justify-content-center mt-5 mb-4 text-capitalize" href="{{ route('login') }}">All Ready have an account</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection