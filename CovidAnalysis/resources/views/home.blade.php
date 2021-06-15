@extends('layouts.app')

@section('content')
<div>
    <div class="container about-wrap">
        <div class="row">
            <div class="col-12 col-sm-4 based-wrap">
                Sentiment analysis based on tweets between January 15, 2020 and March 25, 2021, from <a href="https://zenodo.org/record/3738018#.YMkSK6gzaUn">Covid19 Twitter dataset</a>.
            </div>
            <div class="col-12 col-sm-8 description-based-wrap">
                Working with larger tweets about COVID-19 (coronavirus), the results are projected on graphs, charts and a global map with explanations of each illustrated statistic.
            </div>
        </div>
    </div>
    <div class="container-fluid temporary-offers-wrap">
        <div class="row">
            <div class="col-12 col-sm-6 cap-item" >
                <a href="{{route('statistics')}}">
                    <img src="{{asset ('images/statistics.jpg') }}" alt="" style="width: 220px;">
                </a>
            </div>
            <div class="col-12 col-sm-6 cap-item">
                <a href="{{route('map-page')}}">
                    <img src="{{asset ('images/map.png') }}" alt="" style="width: 240px;">
                </a>
            </div>
        </div>
    </div>
    <div class="container about-wrap home-wrap">
        <h1>About Covid-19 Virus</h1>
        <p>As we know, the entire population of the globe has been alerted since the end of 2019 by the COVID-19 virus. This sad topic has become the most popular and most debated topic both in meetings with friends or family, and on social networks with strangers from all over the world. Opinions were divided from the beginning, some people being much too panicked and others maybe too optimistic. Based on these, we can identify the highest moment of the COVID-19 pandemic, but also the moment when people learned to live with this enemy virus.</p>
        <p>Our lives has changed more and more by the pandemic triggered by the Covid19 virus (Coronavirus). It all started at the end of 2019, in the Chinese city of Wuhan, following an infection from animal to human, thus assuming that this virus started from the markets with live animals. COVID-19 has spread rapidly throughout China, but by January 15, 2020, it had infected more than 200 countries across the globe.</p>
        <p>The project aims to develop a big-data analysis system, for determining and classifying the feelings in real time of some tweet messages from the social network Twitter, related to the subject Covid-19 / Coronavirus. This analysis will be based on real input data, and the results obtained reflect feelings in today's world. </p>
    </div>
    <div class="container about-wrap home-wrap">
        <h1>About Covid-19 Vaccine</h1>
        <p>As we know, the entire population of the globe has been alerted since the end of 2019 by the COVID-19 virus. This sad topic has become the most popular and most debated topic both in meetings with friends or family, and on social networks with strangers from all over the world. Opinions were divided from the beginning, some people being much too panicked and others maybe too optimistic. Based on these, we can identify the highest moment of the COVID-19 pandemic, but also the moment when people learned to live with this enemy virus.</p>
        <p>Our lives has changed more and more by the pandemic triggered by the Covid19 virus (Coronavirus). It all started at the end of 2019, in the Chinese city of Wuhan, following an infection from animal to human, thus assuming that this virus started from the markets with live animals. COVID-19 has spread rapidly throughout China, but by January 15, 2020, it had infected more than 200 countries across the globe.</p>
        <p>The project aims to develop a big-data analysis system, for determining and classifying the feelings in real time of some tweet messages from the social network Twitter, related to the subject Covid-19 / Coronavirus. This analysis will be based on real input data, and the results obtained reflect feelings in today's world. </p>
    </div>
    <div class="container about-wrap home-wrap">
        <h1>Analysis Dataset</h1>
        <p>As we know, the entire population of the globe has been alerted since the end of 2019 by the COVID-19 virus. This sad topic has become the most popular and most debated topic both in meetings with friends or family, and on social networks with strangers from all over the world. Opinions were divided from the beginning, some people being much too panicked and others maybe too optimistic. Based on these, we can identify the highest moment of the COVID-19 pandemic, but also the moment when people learned to live with this enemy virus.</p>
        <p>Our lives has changed more and more by the pandemic triggered by the Covid19 virus (Coronavirus). It all started at the end of 2019, in the Chinese city of Wuhan, following an infection from animal to human, thus assuming that this virus started from the markets with live animals. COVID-19 has spread rapidly throughout China, but by January 15, 2020, it had infected more than 200 countries across the globe.</p>
        <p>The project aims to develop a big-data analysis system, for determining and classifying the feelings in real time of some tweet messages from the social network Twitter, related to the subject Covid-19 / Coronavirus. This analysis will be based on real input data, and the results obtained reflect feelings in today's world. </p>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script>
    </script>
@endsection
@section('styles')
    @parent
@endsection

