@extends('layouts.app')

@section('content')
<div>
    <div class="container about-wrap" id="statistics-wrap">
        <h1>Statistics</h1>

        <div class="tweets-wrap statistic-wrap">
            <h2>Number of tweets (positive/negative) per month</h2>
            <div class="col-sm-6">
                {!! $chartCountTweet->container() !!}
                {!! $chartCountTweet->script() !!}
            </div>
        </div>

        <div class="tabs-nmodels">
            <h2>N-gram Models - The most common words used</h2>
            <div id="tabs-modelgrams">
                <ul>
                    <li class="header-tabs">
                        <a href="#tabs-modelgrams-unigram" class="adjust-tab-width">Unigram</a>
                    </li>
                    <li class="header-tabs">
                        <a href="#tabs-modelgrams-bigram" class="adjust-tab-width">Bigram</a>
                    </li>
                    <li class="header-tabs">
                        <a href="#tabs-modelgrams-trigram" class="adjust-tab-width">Trigram</a>
                    </li>
                </ul>
                <div id="tabs-modelgrams-unigram" class="row fixed-tabs" style="margin-left: 1px; margin-right: 1px">
                    <div class="row" style="width: 100%;">
                        <div class="col-sm-7" style="height: 420px;">
                            {!! $chartUnigram->container() !!}
                            {!! $chartUnigram->script() !!}
                        </div>
                        <div class="col-sm-3">
                            <p>The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...</p>
                        </div>
                    </div>
                </div>
                <div id="tabs-modelgrams-bigram" class="row fixed-tabs" style="margin-left: 1px; margin-right: 1px">
                    <div class="row" style="width: 100%;">
                        <div class="col-sm-7" style="height: 420px;">
                            {!! $chartBigram->container() !!}
                            {!! $chartBigram->script() !!}
                        </div>
                        <div class="col-sm-3">
                            <p>The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...</p>
                        </div>
                    </div>
                </div>
                <div id="tabs-modelgrams-trigram" class="row fixed-tabs" style="margin-left: 1px; margin-right: 1px">
                    <div class="row" style="width: 100%;">
                        <div class="col-sm-7" style="height: 420px;">
                            {!! $chartTrigram->container() !!}
                            {!! $chartTrigram->script() !!}
                        </div>
                        <div class="col-sm-3">
                            <p>The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...The figure shows...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="covid-wrap statistic-wrap">
            <h2>Usage "Covid / Coronavirus" words over time</h2>
            <div class="col-sm-6">
                {!! $chartCovidFrequency->container() !!}
                {!! $chartCovidFrequency->script() !!}
            </div>
        </div>

        <div class="vaccine-wrap statistic-wrap">
            <h2>Usage "Vaccine" words over time</h2>
            <div class="col-sm-6">
                {!! $chartVaccineFrequency->container() !!}
                {!! $chartVaccineFrequency->script() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            $("#tabs-modelgrams").tabs();
        });
    </script>
@endsection
@section('styles')
    @parent
@endsection

