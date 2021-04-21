@extends('layouts.app')

@section('content')
    <div class="jumbotron action-wrap">
        <video autoplay="" muted="" loop="" class="videobg">
            <source src="{{asset ('movie/COVID19_full.mp4') }}" type="video/mp4">
        </video>
        <div class="video-cover"></div>
        <div class="action-message">
{{--            <span>blabalalal</span>--}}
{{--            <em>aaaaaaaaa</em>--}}
        </div>
    </div>
    <div class="container about-wrap" id="about-covid">
        <div class="row">
            <div class="col-12 col-sm-4 cap-item based-wrap">
                 Based on sentiment analysis of tweets between 19 December 2019 and April 2021.
            </div>
            <div class="col-12 col-sm-8 cap-item description-based-wrap">
                Working with the bigger data set tweets about COVID-19 (coronavirus), we put the results on the global maps and made many statistics about it.
            </div>
        </div>
    </div>
    <div class="container-fluid temporary-offers-wrap">
        <div class="row">
            <div class="col-12 col-sm-6 cap-item" >
                <a href="#statistics-wrap">
                    <img src="{{asset ('images/statistics.jpg') }}" alt="" style="width: 270px;">
                </a>
            </div>
            <div class="col-12 col-sm-6 cap-item">
                <a href="#map-wrap" >
                    <img src="{{asset ('images/map.png') }}" alt="" style="width: 296px;">
                </a>
            </div>
        </div>
    </div>
    <div class="container about-wrap" id="map-wrap">
        <div class="row filters-title">
            <h1>The most words used from <a href="https://github.com/thepanacealab/covid19_twitter/blob/master/COVID_19_dataset_Tutorial.ipynb">dataset</a></h1>
        </div>
    </div>
    <div class="container about-wrap" id="statistics-wrap">
        <div class="row filters-title">
            <h1>Statistics</h1>

        </div>
        <div class="row filters-subtitle">
            <h2>Usage COVID19/CORONAVIRUS words over time</h2>
            <p>The figure shows a comparison of words popularity over time for the two most popular words #coronavirus and #covid19.</p>
        </div>
        <div class="row filters-subtitle">
            <h2>Usage VACCINE hashtag over time</h2>
            <p>The figure shows a frequency of the word #vaccine.</p>
        </div>
        <div class="row filters-subtitle">
            <h2>Entities over time</h2>
            <p>The table shows the top five entities (confidence level -2) and their frequency per month in the TweetsCOV19 dataset since the beginning of 2020.- de <a href="https://data.gesis.org/tweetscov19/">editat</a></p>
        </div>
    </div>
    <div class="container about-wrap" id="map-wrap">
        <div class="row filters-title">
            <h1>Map</h1>
            <p>The following map shows the approximated geolocation distribution of TweetsCOV19 tweets at a global scale.</p>
            <p>This dataset represents the geographical <a href="https://data.humdata.org/dataset/covid-19-twitter-data-geographic-distribution?force_layout=desktop">distribution</a> of Twitter users and tweets related to Coronavirus (COVID-19) pandemic at three levels. The data was collected and processed by the AIDR system (<a href="http://aidr.qcri.org">http://aidr.qcri.org</a>)</p>
            <div class='tableauPlaceholder' id='viz1619028639153' style='position: relative; width: 90%; height: 700px;'>
                <noscript>
                    <a href='https:&#47;&#47;data.humdata.org&#47;dataset&#47;covid-19-twitter-data-geographic-distribution?force_layout=desktop'>
                        <img alt='COVID-19 Twitter Data Geographic Distribution ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;CO&#47;COVID-19TwitterDataGeographicDistribution&#47;COVID-19TwitterDataGeographicDistribution&#47;1_rss.png' style='border: none' /></a>
                </noscript>
                <object class='tableauViz'  style='display:none;'>
                    <param name='host_url' value='' />
                    <param name='embed_code_version' value='3' />
                    <param name='site_root' value='' />
                    <param name='name' value='COVID-19TwitterDataGeographicDistribution&#47;COVID-19TwitterDataGeographicDistribution' />
                    <param name='tabs' value='no' />
                    <param name='toolbar' value='no' />
                    <param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;CO&#47;COVID-19TwitterDataGeographicDistribution&#47;COVID-19TwitterDataGeographicDistribution&#47;1.png' />
                    <param name='animate_transition' value='yes' />
                    <param name='display_static_image' value='yes' />
                    <param name='display_spinner' value='yes' />
                    <param name='display_overlay' value='yes' />
                    <param name='display_count' value='yes' />
                    <param name='filter' value='iframeSizedToWindow=true' />
                    <param name='showAppBanner' value='false' />
                </object>
            </div>
            <script type='text/javascript'>
                var divElement = document.getElementById('viz1619028639153');
                var vizElement = divElement.getElementsByTagName('object')[0];
                vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth)+'px';
                var scriptElement = document.createElement('script');
                scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
                vizElement.parentNode.insertBefore(scriptElement, vizElement);
        </script>
        </div>
    </div>
@endsection
