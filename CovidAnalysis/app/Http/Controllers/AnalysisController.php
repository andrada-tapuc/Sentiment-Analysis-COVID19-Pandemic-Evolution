<?php

namespace App\Http\Controllers;

use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
use App\Charts\SentimentFrequencyChart;
use App\ContinentFrequency;
use App\CoronaFrequency;
use App\CountryFrequency;
use App\Location;
use App\ModelBigram;
use App\ModelTrigram;
use App\ModelUnigram;
use App\SentimentFrequency;
use App\VaccinFrequency;
use Illuminate\Http\Request;
use Sentiment\Analyzer;

class AnalysisController extends Controller
{
    public static function isNegativeAnalysis($sentence){
        return (new \Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis)->isNegative($sentence);
    }

    public static function isNeutralAnalysis($sentence){
        return (new \Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis)->isNeutral($sentence);
    }

    public static function isPositiveAnalysis($sentence){
        return (new \Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis)->isPositive($sentence);
    }

    public static function getDecisionAnalysis($sentence){
        return (new \Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis)->decision($sentence);
    }

    public static function getScoreAnalysis($sentence){
        return (new \Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis)->score($sentence);
    }

    public static function getAllScoresAnalysis($sentence){
        return (new \Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis)->scores($sentence);
    }

    public static function getCompleteAnalysis($sentence){

//        $analysis = new SentimentAnalysis(storage_path('custom_dictionary/'));
        return json_encode([
            'Negative' => self::isNegativeAnalysis($sentence),
            'Neutral' => self::isNeutralAnalysis($sentence),
            'Positive' => self::isPositiveAnalysis($sentence),
            'Decision' => self::getDecisionAnalysis($sentence),
            'Score' => self::getScoreAnalysis($sentence),
            'Scores' => self::getAllScoresAnalysis($sentence),

        ]);
    }

    public static function getSentimentEmojiSentence($string)
    {
        $analyzer = new Analyzer();

        $newWords = [
            'rubbish'=> '-1.5',
            'mediocre' => '-1.0',
            'agressive' => '-0.5'
        ];

        $analyzer->updateLexicon($newWords);

        return $analyzer->getSentiment($string);
    }

    public static function getSentimentText($text)
    {
        $analyzer = new Analyzer();

        $newWords = [
            'rubbish'=> '-1.5',
            'mediocre' => '-1.0',
            'agressive' => '-0.5'
        ];

        $analyzer->updateLexicon($newWords);

        foreach ($text as $string) {
            $scores = $analyzer->getSentiment($string);
        }
        return $scores;
    }

    public function mapCharts()
    {
//        $coordinates = Location::all();
        $coordinates = Location::limit(50)->get();
        $coordinates_count = count($coordinates);
        $map_markes = array ();
        foreach ($coordinates as $key => $location) {
            $map_markes[] = (object)array(
                'longitude' => $location->long,
                'latitude' => $location->lat,
            );
        }

        $country = CountryFrequency::limit(25)->orderBy('total_tweets', 'DESC')->pluck('total_tweets', 'country');
        $positiveCountry = CountryFrequency::pluck('positive_tweets', 'country');
        $negativeCountry = CountryFrequency::pluck('negative_tweets', 'country');
        $countryChart = new SentimentFrequencyChart;
        $countryChart->labels($country->keys());
        $countryChart->dataset('Count of tweets', 'line',  $country->values())
            ->backgroundColor('grey');
        $countryChart->dataset('Positive tweets', 'bar',  $positiveCountry->values())
            ->backgroundColor('#90EE90');
        $countryChart->dataset('Negative tweets', 'bar',  $negativeCountry->values())
            ->backgroundColor('#CD5C5C');

        $continents = ContinentFrequency::orderBy('total_tweets', 'DESC')->pluck('total_tweets', 'continent');
        $positiveContinents = ContinentFrequency::pluck('positive_tweets', 'continent');
        $negativeContinents = ContinentFrequency::pluck('negative_tweets', 'continent');
        $continentsChart = new SentimentFrequencyChart;
        $continentsChart->labels($continents->keys());
        $continentsChart->dataset('Count of tweets', 'line',  $continents->values())
            ->backgroundColor('grey');
        $continentsChart->dataset('Positive tweets', 'bar',  $positiveContinents->values())
            ->backgroundColor('#90EE90');
        $continentsChart->dataset('Negative tweets', 'bar',  $negativeContinents->values())
            ->backgroundColor('#CD5C5C');


        return view('map', compact([ 'countryChart', 'coordinates','continentsChart', 'coordinates_count']));
    }

    public function statisticsCharts()
    {
        $totalSentimentTweets = SentimentFrequency::pluck('total_tweets', 'month');
        $positiveTweets = SentimentFrequency::pluck('positive_tweets', 'month');
        $negativeTweets = SentimentFrequency::pluck('negative_tweets', 'month');

        $formatLabels = [];
        foreach ($totalSentimentTweets->keys() as $key) {
            $dateFormat = strtotime($key);
            array_push($formatLabels, date('F Y',$dateFormat));
        }
        $chartCountTweet = new SentimentFrequencyChart;
        $chartCountTweet->labels($formatLabels);
        $chartCountTweet->dataset('Count of tweets', 'line', $totalSentimentTweets->values())
            ->backgroundColor('grey');
        $chartCountTweet->dataset('Positive tweets', 'bar', $positiveTweets->values())
            ->backgroundColor('#90EE90');
        $chartCountTweet->dataset('Negative tweets', 'bar', $negativeTweets->values())
            ->backgroundColor('#CD5C5C');


        $unigramModel = ModelUnigram::limit(25)->pluck('frequency', 'text');
        $chartUnigram = new SentimentFrequencyChart;
        $chartUnigram->labels($unigramModel->keys());
        $chartUnigram->dataset('Count of tweets', 'pie', $unigramModel->values())
            ->backgroundColor(['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
                '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
                '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
                '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089']);


        $bigramModel = ModelBigram::limit(25)->pluck('frequency', 'text');
        $chartBigram = new SentimentFrequencyChart;
        $chartBigram->labels($bigramModel->keys());
        $chartBigram->dataset('Count of tweets', 'pie', $bigramModel->values())
            ->backgroundColor(['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
                '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
                '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
                '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089']);

        $trigramModel = ModelTrigram::limit(25)->pluck('frequency', 'text');
        $chartTrigram = new SentimentFrequencyChart;
        $chartTrigram->labels($trigramModel->keys());
        $chartTrigram->dataset('Count of tweets', 'pie', $trigramModel->values())
            ->backgroundColor(['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
                '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
                '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
                '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089']);

        $coronaFrequency = CoronaFrequency::pluck('count', 'month');
        $vaccinFrequency = VaccinFrequency::pluck('count', 'month');

        $formatCoronaLabels = [];
        foreach ($coronaFrequency->keys() as $key) {
            $dateFormat = strtotime($key);
            array_push($formatCoronaLabels, date('F Y', $dateFormat));
        }

        $formatVaccinLabels = [];
        foreach ($vaccinFrequency->keys() as $key) {
            $dateFormat = strtotime($key);
            array_push($formatVaccinLabels, date('F Y', $dateFormat));
        }

        $chartCovidFrequency = new SentimentFrequencyChart;
        $chartCovidFrequency->labels($formatCoronaLabels);
        $chartCovidFrequency->dataset('Covid/Coronavirus', 'line', $coronaFrequency->values())
            ->backgroundColor('#CD5C5C');

        $chartVaccineFrequency = new SentimentFrequencyChart;
        $chartVaccineFrequency->labels($formatVaccinLabels);
        $chartVaccineFrequency->dataset('Vaccine', 'line', $vaccinFrequency->values())
            ->backgroundColor('#90EE90');

        return view('statistics', compact(['chartCountTweet', 'chartUnigram', 'chartBigram', 'chartTrigram', 'chartCovidFrequency','chartVaccineFrequency']));
    }
}
