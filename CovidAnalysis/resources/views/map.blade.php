@extends('layouts.app')

@section('content')
<div class="container about-wrap" id="map-wrap">
    <h1>Map</h1>
    <p>The following map shows the approximated geolocation distribution of TweetsCOV19 tweets at a global scale.</p>

    @foreach($coordinates as $index=>$event)
        <input type="hidden" id="coordonites_{{$index}}" value="" data-lat="{{$event->lat}}" data-long="{{$event->long}}" data-sentiment="{{$event->sentiment}}" />
    @endforeach
    <input type="hidden" id="total" value="{{$coordinates_count}}"/>

    <div id="map"></div>

    <div class="country-wrap statistic-wrap" style="width: 100%; height: 100vh;">
        <h2>Country statisticts tweets</h2>
        <div  style="width: 100%; height: 100vh;">
            {!! $countryChart->container() !!}
            {!! $countryChart->script() !!}
        </div>
    </div>

    <div class="continents-wrap statistic-wrap" style="width: 100%;">
        <h2>Continents statisticts tweets</h2>
        <div style="width: 60%;  height: 70vh;">
            {!! $continentsChart->container() !!}
            {!! $continentsChart->script() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script type="application/javascript" src="{{ asset('js/map_leaflet.js') }}"></script>
@endsection
@section('styles')
    @parent
@endsection

