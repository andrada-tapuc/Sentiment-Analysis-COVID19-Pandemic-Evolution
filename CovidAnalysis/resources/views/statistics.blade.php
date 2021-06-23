@extends('layouts.app')

@section('content')
<div>
    <div class="container about-wrap" id="statistics-wrap">
        <h1 style="font-weight: bold;">Statistics</h1>

        <div class="tweets-wrap statistic-wrap">
            <h2>The key moments of th COVID-19 pandemic</h2>
            <div style="margin-left: 15%;margin-right: 15%; padding-top: 2%;">
                {!! $chartCountTweet->container() !!}
                {!! $chartCountTweet->script() !!}
           </div>
            <p style="padding-top: 2%;">The first online crisis regarding Covid-19 / Coronavirus is in April 2020, but the number of tweets increases very sharply in March 2020. The reason for the beginning of the online crisis is the very beginning of the pandemic. On March 11, 2020, the <a href=" https://www.who.int/ ">WHO</a> (World Health Organization) stated in this official <a href="https://www.who.int/director-general/speeches/detail/who-director-general-s-opening-remarks-at-the-media-briefing-on-covid-19---11-march-2020">post</a> that Covid-19 is a pandemic, when the number of cases had reached 118,000 in 114 countries. </p>
            <p>Dr. Tedrod from WHO claims in this post about the pandemic that "it is not a word to use lightly or carelessly. It is a word that, if misused, can cause unreasonable fear, or unjustified acceptance that the fight is over, leading to unnecessary suffering and death." Which justifies in our analysis why Twitter activity had an explosion during this terrifying period for the world's population when the first wave of the Covid-19 virus officially began.</p>
            <p>Another significant increase in the graph of the number of tweets can be noticed in July 2020, the period in which the second wave of the second wave of the pandemic started in America, and because Twitter is very popular here, online activity has increased. According to Simona Iftimie's article in journal.plos.org, the second wave of the pandemic began on July 1, 2020, when the number of cases reached 200,000 per day globally, which led to a new outbreak of Covid-19 in the online environment, which can be easily seen in Figure 11.</p>
            <p>The last increase in the graph is observed in December 2020. The explanation for this can be found in <a href="https://www.livemint.com/opinion/online-views/global-covid-trends-the-second-wave-and-where-we-are-headed-11623168003670.html">the article</a> by Alok Sheel on linemint.com, namely that the second wave of the Covid-19 pandemic began on December 6, 2020.</p>
        </div>

        <div class="covid-wrap statistic-wrap">
            <div style="margin-left: 15%;margin-right: 15%;margin-bottom: 20px;">
                {!! $chartCovidFrequency->container() !!}
                {!! $chartCovidFrequency->script() !!}
            </div>
            <p>In this graph it is projected that the subject "Covid-19" had a great impact on the life of the population in the periods March - April, June - July and November - December of 2020.Looking for the explanation for these significant periods in our statistics, we remind that in the previous sub point that:</p>
            <ul style="text-align: left;">
                <li><b>March 2020</b>: the beginning of the Covid-19 pandemic and the beginning of the first wave;</li>
                <li><b>July 2020</b>: the second wave of Covid-19 in the USA;</li>
                <li><b>December 2020</b>: the second Covid-19 wave in Europe.</li>
            </ul>
        </div>

        <div class="vaccine-wrap statistic-wrap" >
            <div  style="margin-left: 15%;margin-right: 15%;margin-bottom: 20px;">
                {!! $chartVaccineFrequency->container() !!}
                {!! $chartVaccineFrequency->script() !!}
            </div>
            <p>To read and exemplify this chart increases, we will rely on the statements made by AJMC (The American Journal of Managed Care) in the <a href="https://www.ajmc.com/view/a-timeline-of-covid19-developments-in-2020">article</a> on the progress of the 2020 pandemic.</p>
            <p>In the chart above we see slight increases in May and July of 2020. According to the article mentioned above, of the AJMC, in May 2020 the announcement of the Trump administration regarding the development of the AstraZeneca vaccine took place, and in July 2020 the effectiveness of the developed vaccine was announced by Moderna, Pfizer and BioNTech.</p>
            <p>The graph shows that starting with October 2020, people online have become much more interested in the vaccine against the Covid-19 virus, the number of tweets increasing greatly for the coming months. This explosion in the online Twitter environment was the beginning of the official administration of the Covid-19 vaccine on December 2, 2020, stated by The New York Times in <a href="https://www.nytimes.com/interactive/2021/world/covid-vaccinations-tracker.html">the article</a> on this subject.</p>
        </div>

        <h2>The Most Common Topics</h2>
        <div class="vaccine-wrap statistic-wrap row">
            <div class="col-sm-7" style="margin-bottom: 20px;">
                {!! $topicsChart->container() !!}
                {!! $topicsChart->script() !!}
            </div>
            <div class="col-sm-5">
                <h4 style="margin-top: 10%;">The topic that prevails in our tweets is the topic <b>Health & Medicine</b>. This is further clear evidence that Twitter can be a good informant and a realistic source of reporting medical issues and their crises, such as COVID-19.</h4>
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

