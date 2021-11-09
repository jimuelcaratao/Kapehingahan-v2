@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('No authorization found.'))
@section('message1', __("Sorry, the page you're looking for doesn't exist."))
