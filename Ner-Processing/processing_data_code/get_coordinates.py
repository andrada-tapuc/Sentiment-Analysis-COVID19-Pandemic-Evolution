import datetime

from geopy.geocoders import Nominatim
import csv
from time import sleep
import re

def get_location(address, name):
    geolocator = Nominatim(user_agent=name)
    location = geolocator.geocode(address, timeout= None)
    return location


def get_lat(address, name):
    geolocator = Nominatim(user_agent=name)
    location = geolocator.geocode(address, timeout=None)
    return location.latitude


def get_long(address, name):
    geolocator = Nominatim(user_agent=name)
    location = geolocator.geocode(address, timeout=None)
    return location.longitude

# print(get_lat("bacau", "andrada"))

def create_location_csv_file(file, name):
    with open(file, encoding="utf-8") as json_data:
        with open(file[:-4] + "_coordinates.csv", "w", encoding="utf-8") as fileWriten:
            writer = csv.writer(fileWriten)
            writer.writerow(["lat", "long", "data", "sentiment"])
            for tweet in json_data:
                if len(tweet.split(",")) > 1:
                    location = tweet.split(",")[2]
                    data = tweet.split(",")[1]
                    sentiment = tweet.split(",")[3]
                    if get_location(location, name) is not None:
                        lat = get_lat(location, name)
                        long = get_long(location, name)
                        writer.writerow([lat, long, data, sentiment])
                    sleep(1)


def transformDate(file):
    with open(file, encoding="utf-8") as json_data:
        next(json_data)
        with open(file[:-4] + "_coordinates_transform_date.csv", "w", encoding="utf-8") as fileWriten:
            writer = csv.writer(fileWriten)
            writer.writerow(["lat", "long", "data", "sentiment"])
            for tweet in json_data:
                if len(tweet.split(",")) > 1:
                    lat = tweet.split(",")[0]
                    long = tweet.split(",")[1]
                    data = datetime.datetime.strptime(tweet.split(",")[2], '%m-%d-%Y').strftime('%Y-%m-%d %H:%M:%S')
                    sentiment = int(tweet.split(",")[3])
                    writer.writerow([lat, long, data, sentiment])


# index = 0
# while index < 1:
    # file = "../processing_data_code/sentiment_analysis_data/extracted_tweets" + str(index) + "_short.sentiment-analysis.csv"
file = "../processing_data_code/all_coordinates_data.csv"
# file = "../processing_data_code/all_coordinates_data_coordinates_transform_date.csv"
# name = "Andrada" + str(index)
transformDate(file)
    # index += 1
    # print(index)
    # sleep(1)

