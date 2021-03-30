<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public static function buildBaseString($baseURI, $method, $params)
    {
        $r = array();
        ksort($params);
        foreach($params as $key=>$value){
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    public static function buildAuthorizationHeader($oauth)
    {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        $r .= implode(', ', $values);
        return $r;
    }

    public static function queryTwitterApi($search, $count)
    {
        $url = "https://api.twitter.com/1.1/search/tweets.json";
        if($search != "")
            $search = "#".$search;
//        $query = array( 'count' => $count, 'q' => urlencode($search), "result_type" => "recent", "until" =>'2020-01-01');
        $query = array( 'count' => $count, 'q' => urlencode($search), "result_type" => "recent");
        $oauth_access_token = env('TWITTER_API_AUTH_TOKEN');
        $oauth_access_token_secret = env('TWITTER_API_AUTH_SECRET_TOKEN');
        $consumer_key = env('TWITTER_API_KEY');
        $consumer_secret = env('TWITTER_API_KEY_SECRET');

        $oauth = array(
            'oauth_consumer_key' => $consumer_key,
            'oauth_nonce' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $oauth_access_token,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0');

        $base_params = empty($query) ? $oauth : array_merge($query,$oauth);
        $base_info = self::buildBaseString($url, 'GET', $base_params);
        $url = empty($query) ? $url : $url . "?" . http_build_query($query);

        $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;

        $header = array(self::buildAuthorizationHeader($oauth), 'Expect:');
        $options = array( CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false);

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);
        return  json_decode($json, true);
    }


    public static function testTwitterApi(){
//        dd(self::queryTwitterApi('corona', 2));
        $allData = (array());
        file_put_contents("data.txt", "[" . "\n" . "\t{" . "\n");
//        dd('da');

        $tweets = (array)self::queryTwitterApi('corona', 2);
        $tweetsList = $tweets['statuses'];
        $index = 0;

        foreach( $tweetsList as $tweet ) {
            $jsonTweet = json_encode([
                "created_at" => $tweet['created_at'],
                "text" => $tweet['text'],
                "user_name" => $tweet['user']['name'],
                "user_location" => $tweet['user']['location'],
                "user_followers_count" => $tweet['user']['followers_count'],
                "user_description" => $tweet['user']['description'],
                "user_geo" => $tweet['geo'],
                "user_coordinates" => $tweet['coordinates'],
                "user_place" => $tweet['place'],
            ]);
//                file_put_contents("data.txt", "\t" . "\t" . $key . ": " . $value .  "\n");
            }
//            if($index != count($tweetsList))
//                file_put_contents("data.txt", "}" . "\n" . "\t{");
//            else
//                file_put_contents("data.txt", "}" . "\n");
            array_push($allData, $jsonTweet);
            $index = $index + 1;


        return $allData;
    }

}
