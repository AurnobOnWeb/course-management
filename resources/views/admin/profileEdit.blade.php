@extends('admin.layouts.template')
@section('title')
Profile Edit | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
@include('admin.profile.updateProfileInfo')


@include('admin.profile.updatePassword')


@include('admin.profile.deleteProfile')



@endsection