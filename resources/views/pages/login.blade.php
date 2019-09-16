@extends('layouts.default')
@section('content')

<div class="container">
    <form action="/login" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>username: </label>
            <input name="username" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>password: </label>
            <input name="password" type="text" class="form-control">
        </div>
        <input type="submit" name="login" value="login" class="btn btn-primary">
    </form>
</div>
@stop
