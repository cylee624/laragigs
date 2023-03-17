<?php /*
@extends('layout')
@section('content')
*/ ?>
<x-layout>
@include('partials._hero')

@include('partials._search')
<?php // <h1>{{$heading}}</h1> */ ?>
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4" >

<?php /*
@php
    $test = 1;
@endphp
{{$test}}


@if(count($listings)==0)
    <p>No listing found</p>
@endif
*/ ?>
@unless(count($listings)==0)
 

@foreach($listings as $listing)
    <x-listing-card :listing="$listing" />

<?php /*
<h2>
        <a href="listings/{{$listing['id']}}">
            {{$listing['title']}}
        </a>
    </h2>
    <p>{{$listing['description']}}</p>
    */ ?>
    
@endforeach

@else
    <p>No listing found</p>
@endunless

<div class="mt-6 p-4">{{$listings->links()}}</div>
 

</x-layout>
<?php /*
@endsection
*/ ?>