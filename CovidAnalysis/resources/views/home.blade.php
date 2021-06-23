@extends('layouts.app')

@section('content')
<div>
    <div class="container about-wrap">
        <div class="row">
            <div class="col-12 col-sm-4 based-wrap">
                Sentiment analysis based on tweets between January 15, 2020 and March 25, 2021, from <a href="https://zenodo.org/record/3738018#.YMkSK6gzaUn">Covid19 Twitter dataset</a>.
            </div>
            <div class="col-12 col-sm-8 description-based-wrap">
                Working with larger tweets about COVID-19 (coronavirus),his project aims to identify the peak moments of the Covid-19 pandemic and the period in which the world's population began to consider the vaccine against it and to develop a map of the emotions on Twitter conveyed by user's posts according to the GPS coordinates and highlight key moments during the COVID pandemic.
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
        <p>Among the most popular social networks is Twitter, which was founded in 2006 in the US, with a 15-year experience in virtual life, which has 330 million active users per month, and the posts are called tweets. Unfortunately, this application is not as popular all over the globe, for example in Romania the most popular social network remains Facebook.
            As mentioned above, Twitter is a platform that keeps you up to date with news and where many users share their opinions on all kinds of topics, especially when there are global crises. Such an explosion on social networks took place with the onset of the coronavirus pandemic in December 2019, when the first Covid-19 case was announced in Wuhan, China, which later became the first outbreak of coronavirus. Covid-19 first manifested itself as pneumonia, and later scientists noticed various symptoms to recognize it, and the first declared causes seem to have started in animal markets, the origin of this virus being in bats. The spread of this virus was very rapid throughout the globe.
        </p>
        <p>On January 30, 2020, the WHO declared a global state of emergency for health and followed various safety measures for the population, but the virus has spread to many countries, causing a considerable number of deaths and victims of lung disease seriously, at present statistics show that there are 177 million cases of which 3,82 million are dead.</p>
    </div>
    <div class="container about-wrap home-wrap">
        <h1>About Covid-19 Vaccine</h1>
        <p>All people went through terrible times, coronavirus becoming the main enemy in the fight against life. Over time, we have learned to live with this fear and adapt to the new times and recommended precautions.
            During the Covid-19 pandemic, researchers tried to develop the best vaccines against this virus. Thus, in December 2020, the first vaccine was approved, Pfizer BioNTech, and in the same month, the administration of the vaccine to the world's population began. Many other vaccines followed, and in March 2021, 308 vaccines were on the rise and development.
        </p>
    </div>
    <div class="container about-wrap home-wrap">
        <h1>Analysis Dataset</h1>
        <p>In addition to the tweets extracted with the Twitter API, we took over a very large data set, created by Juan M. Banda and Elena Tutubalina for scientific analysis. The <a href="https://zenodo.org/record/3738018#.YJO447UzaUn">Covid19 Twitter dataset</a> is updated every day with new tweets added about Covid19, so there is data from January 15, 2020 to April 4, 2021.</p>
        <p>Initially, there were 152,920,832 tweets in this data set, and after the removal of retweets, 30,990,645 remained. Because our analysis refers only to posts in English, tweets in other languages were ignored, as well as posts without text or repetitive, so the data set with which we started the analysis consists of <b>650,000</b> tweets, on which sentiment was applied sentiment analysis. These posts were recorded in the full_tweets table in the database.</p>
        <p>From the previously mentioned data set, processed and analyzed from the point of view of the expressed feeling, the tweets with the declared location were kept, thus forming the data set subsequently projected on the statistical map, consisting of <b>183,564</b> records.</p>
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
