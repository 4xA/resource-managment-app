@extends('templates.app')

@section('title', __('Resource Managment App'))

@section('content')
    <resources-page
        :resources="{{ json_encode($resources) }}"
    />
@endsection
