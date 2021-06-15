import json
from collections import Counter
from nltk.sentiment import SentimentIntensityAnalyzer
from preprocessingText import clean_text_special_characters
import csv
from datetime import datetime


def sentiment(tweet):
    sia = SentimentIntensityAnalyzer()
    if sia.polarity_scores(tweet)["compound"] > 0:
        return True
    return False


def sentimentTweets(fileInput):
    with open(fileInput, encoding="utf-8") as json_data:
        with open(fileInput[:-4] + "sentiment-analysis.csv", "w", encoding="utf-8") as fileWriten:
            writer = csv.writer(fileWriten)
            for tweet in json_data:
                data = json.loads(tweet)
                if sentiment(clean_text_special_characters(data["text"])[1:-1]):
                    sentiment_analysis = 1
                else:
                    sentiment_analysis = 0
                new_datetime = datetime.strftime(datetime.strptime(data["created_at"], '%a %b %d %H:%M:%S +0000 %Y'),
                                                 '%m-%d-%Y')

                writer.writerow([clean_text_special_characters(data["text"])[1:-1], new_datetime,
                                 clean_text_special_characters(data['location'])[1:-1], sentiment_analysis])


def get_sentiment_frequency(file):
    with open(file, 'r', encoding="utf-8") as f:
        reader = csv.reader(f, delimiter=',')
        lines = [line for line in reader if line != '']
        # counts = Counter([l[1].split('-')[0] + '-' + l[1].split('-')[2] for l in lines if l !=[]])
        counts = Counter([l[3] for l in lines if l !=[]])


    # with open(file[:-4] + "-date_frequency.csv", 'w', encoding="utf-8") as f:
    #     writer = csv.writer(f, delimiter=',')
    #     for i in counts:
    #         writer.writerow([i, counts[i]])

    with open(file[:-4] + "-frequency.csv", 'w', encoding="utf-8") as f:
        writer = csv.writer(f, delimiter=',')
        writer.writerow(["Sentiment", 'Total_Frequency'])
        writer.writerow(["0", counts["0"]])
        writer.writerow(["1", counts["1"]])

index = 0
while index < 1:
    file = "../processing_data_code/sentiment_analysis_data/extracted_tweets" + str(index) + "_short.sentiment-analysis.csv"
    # file = "../processing_data_code/total_hydrated/extracted_tweets" + str(index) + "_short.json"
    # get_sentiment_frequency(file)
    get_sentiment_frequency(file)
    index += 1
    print(index)