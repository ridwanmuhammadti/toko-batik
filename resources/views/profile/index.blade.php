@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
          <div class="card-body">
          <h1>My Profile</h1>
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$user->name}}</td>
                </tr>
                 <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>No Hp</td>
                    <td>:</td>
                    <td>{{$user->nohp}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$user->alamat}}</td>
                </tr>
                
            </table>

            <h1>Edit Profile</h1>
            <form action="/profile/{id}/update" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama</label>
                <div class="col-md-6">
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <div class="col-md-6">
                <input type="email" name="email" value="{{$user->email}}" required class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">No HP</label>
                <div class="col-md-6">
                <input type="text" name="nohp" value="{{$user->nohp}}" required class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <div class="col-md-6">
                <textarea class="form-control" name="alamat" id="" cols="10" rows="5" required>{{$user->alamat}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Update Profile</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
