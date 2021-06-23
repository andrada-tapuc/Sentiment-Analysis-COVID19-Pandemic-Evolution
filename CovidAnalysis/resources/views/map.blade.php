@extends('layouts.app')

@section('content')
<div class="container about-wrap" id="map-wrap">
    <h1 style="font-weight: bold;">Map</h1>
    <p>The map shows the geolocation distribution of tweets in our dataset, globally. Also, this map offers the opportunity to observe the extent of tweets at national and regional level, zooming in on the map projected in the presentation site.</p>
    <p >In order to reach statistical conclusions as close as possible to reality, for the beginning we will analyze the top of the countries in which Twitter is the most used. According to the numerical statistics provided by the <a href="https://www.tweeplers.com/countries/">post</a> from tweeplers, the top countries where Twitter has the most active users are the following: United States, Brazil, Japan, United Kingdom, India, Indonesia, Spain, Philippines, Turkey, Argentina, Mexico, Canada, Saudi Arabia, etc.</p>

    @foreach($coordinates as $index=>$event)
        <input type="hidden" id="coordonites_{{$index}}" value="" data-lat="{{$event->lat}}" data-long="{{$event->long}}" data-sentiment="{{$event->sentiment}}" />
    @endforeach
    <input type="hidden" id="total" value="{{$coordinates_count}}"/>

    <div id="map"></div>
    <p style="margin-top: 2%;">To deepen and highlight the information we provide through EmoMap, we will compare the results with the official <a href="https://covid19.who.int/">map</a> provided by WHO based on official data regarding cases of Coronavirus infection declared globally. The similarities are as follows: The United States, India, Canada and France are in the top of the most alert areas, both in number of cases, but also in the number of tweets with on COVID-19 and the difference between the two maps in terms of data frequency (cases versus tweets) is Russia, which is an exception due to the lack of activity of Twitter users in this area.</p>
    <p>Another difference between EmoMap and the official WHO map is that the map made by our experiment can highlight the medical crisis by the number of tweets, both in regions as possible in the WHO map, and in countries or cities by applying the zoom-in on our map, action to which the WHO map does not respond.</p>
    <p>The advantage of the map provided by WHO is the possession of official medical data from all over the globe, so the projections on their map are realistic in all countries. We can't say this about EmoMap, where the main problem starts with countries where Twitter is not used as much. Therefore, from this comparison we can conclude that EmoMap is a complementary map of the map officially distributed by WHO</p>
    <h2 style="padding-top: 6%;">Continents statisticts tweets</h2>
    <div class="continents-wrap statistic-wrap row" style="width: 100%;">
        <div class="col-sm-7">
            {!! $continentsChart->container() !!}
            {!! $continentsChart->script() !!}
        </div>
        <div class="col-sm-4">
            <p style="margin-top: 20%;">In continent-based statistics, North America ranks first, with Twitter's cause and popularity in this continent. Then in second and third place are Europe and Asia. Comparing with the <a href="https://covid19.who.int/">statistics</a> made by the WHO (Figure 20)  on the causes made by Covid-19 in each region, we notice that the statistics fit in completely.</p>
        </div>
    </div>

    <div class="country-wrap statistic-wrap" style="width: 100%;padding-top: 5%;">
        <h2>Country statisticts tweets</h2>
        <p >As we can see in last chart, in the top of the most alarmed countries on the subject of "Covid-19" / "Coronavirus" in the statistics made by our experiment are the United States, United Kingdom, India, Canada, Nigeria, France, South Africa, Philippines, etc. Compared with the statistics presented above on the official tweeplers site, we notice that our statistics are close to reality, the United States, United Kingdom and India being in the most emotionally affected areas on the Twitter social network.</p>
        <div style="width: 100%; height: 100vh;">
            {!! $countryChart->container() !!}
            {!! $countryChart->script() !!}
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
