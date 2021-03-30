<?php

namespace App\Http\Controllers;

use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
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

    public static function test(){
        dd(self::getSentimentEmojiSentence('This is very dangerous and bad!'));
//        dd(self::getSentimentText(['Weather today is rubbish',
//            'This cake looks amazing',
//            'His skills are mediocre',
//            'He is very talented',
//            'She is seemingly very agressive',
//            'Marie was enthusiastic about the upcoming trip. Her brother was also passionate about her leaving - he would finally have the house for himself.',
//            'To be or not to be?']));
    }
}
