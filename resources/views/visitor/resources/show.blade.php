@extends('templates.app')

@section('title', $resource['title'] . __(' - Resource Managment App'))

@section('content')
    <resource-page
        :resource="{{ json_encode($resource) }}"
    />
@endsection
