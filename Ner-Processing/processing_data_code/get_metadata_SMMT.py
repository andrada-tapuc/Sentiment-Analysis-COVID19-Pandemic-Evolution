import sys
import tweepy
import json
import math
import csv
import argparse
import os
import os.path as osp
import pandas as pd
from time import sleep
import preprocessor as p


def main():
    global inputfile_data
    parser = argparse.ArgumentParser()
    parser.add_argument("-o", "--outputfile", help="Output file name with extension")
    parser.add_argument("-i", "--inputfile", help="Input file name with extension")
    parser.add_argument("-k", "--keyfile", help="Json api key file name")
    parser.add_argument("-c", "--idcolumn", help="tweet id column in the input file, string name")
    parser.add_argument("-m", "--mode",
                        help="Enter e for extended mode ; else the program would consider default compatible mode")

    args = parser.parse_args()
    if args.inputfile is None or args.outputfile is None:
        parser.error("please add necessary arguments")

    if args.keyfile is None:
        parser.error("please add a keyfile argument")

    with open(args.keyfile) as f:
        keys = json.load(f)

    auth = tweepy.OAuthHandler(keys['consumer_key'], keys['consumer_secret'])
    auth.set_access_token(keys['access_token'], keys['access_token_secret'])
    api = tweepy.API(auth, wait_on_rate_limit=True, retry_delay=60 * 3, retry_count=5,
                     retry_errors={401, 404, 500, 503}, wait_on_rate_limit_notify=True)

    if not api.verify_credentials():
        print("Your twitter api credentials are invalid")
        sys.exit()
    else:
        print("Your twitter api credentials are valid.")

    output_file = args.outputfile
    hydration_mode = args.mode

    output_file_noformat = output_file.split(".", maxsplit=1)[0]
    print(output_file)
    output_file = '{}'.format(output_file)
    output_file_short = '{}_short.json'.format(output_file_noformat)
    if '.tsv' in args.inputfile:
        inputfile_data = pd.read_csv(args.inputfile, sep='\t')
        print('tab seperated file, using \\t delimiter')
    elif '.csv' in args.inputfile:
        inputfile_data = pd.read_csv(args.inputfile)
    elif '.txt' in args.inputfile:
        inputfile_data = pd.read_csv(args.inputfile, sep='\n', header=None, names=['tweet_id'])
        print(inputfile_data)

    if not isinstance(args.idcolumn, type(None)):
        inputfile_data = inputfile_data.set_index(args.idcolumn)
    else:
        inputfile_data = inputfile_data.set_index('tweet_id')

    ids = list(inputfile_data.index)
    print('total ids: {}'.format(len(ids)))

    start = 0
    end = 100
    limit = len(ids)
    i = int(math.ceil(float(limit) / 100))

    if osp.isfile(args.outputfile) and osp.getsize(args.outputfile) > 0:
        with open(output_file, 'rb') as f:
            # may be a large file, seeking without iterating
            f.seek(-2, os.SEEK_END)
            while f.read(1) != b'\n':
                f.seek(-2, os.SEEK_CUR)
            last_line = f.readline().decode()
        last_tweet = json.loads(last_line)
        start = ids.index(last_tweet['id'])
        end = start + 100
        i = int(math.ceil(float(limit - start) / 100))

    print('metadata collection complete')
    print('creating master json file')
    try:
        with open(output_file, 'a') as outfile:
            for go in range(i):
                print('currently getting {} - {}'.format(start, end))
                sleep(6)  # needed to prevent hitting API rate limit
                id_batch = ids[start:end]
                start += 100
                end += 100
                backOffCounter = 1
                while True:
                    try:
                        if hydration_mode == "e":
                            tweets = api.statuses_lookup(id_batch, tweet_mode="extended")
                        else:
                            tweets = api.statuses_lookup(id_batch)
                        break
                    except tweepy.TweepError as ex:
                        print('Caught the TweepError exception:\n %s' % ex)
                        sleep(30 * backOffCounter)  # sleep a bit to see if connection Error is resolved before retrying
                        backOffCounter += 1  # increase backoff
                        continue
                for tweet in tweets:
                    json.dump(tweet._json, outfile)
                    outfile.write('\n')
    except:
        print('exception: continuing to zip the file')

    print('creating minimized json master file')
    with open(output_file_short, 'w') as outfile:
        with open(output_file) as json_data:
            for tweet in json_data:
                data = json.loads(tweet)
                if data['lang'] == 'en':
                    if hydration_mode == "e":
                        text = p.clean(data["full_text"])
                    else:
                        text = p.clean(data["text"])
                    t = {
                        "created_at": data["created_at"],
                        "text": text,
                        "id_str": data["id_str"],
                        "lang": data['lang']
                    }
                    if data["user"]["location"] is not None:
                        if data["user"] is not None:
                            if data["user"]["location"] is not None:
                                t["location"] = data["user"]['location']
                    else:
                        t["location"] = ''

                    if data["place"] is not None:
                        t["place"] = data['place']["full_name"]
                    else:
                        t["place"] = ''
                    json.dump(t, outfile)
                    outfile.write('\n')

    f = csv.writer(open('{}.csv'.format(output_file_noformat), 'w', encoding="utf-8"))
    print('creating CSV version of minimized json master file')
    fields = ["text", "created_at",
              "id_str", "location", "place", "lang"]
    f.writerow(fields)
    with open(output_file_short, encoding="utf-8") as master_file:
        for tweet in master_file:
            data = json.loads(tweet)
            if data['lang'] == 'en':
                f.writerow(
                    [data["text"].encode('utf-8', errors='ignore'),
                     data["created_at"], data["id_str"].encode('utf-8', errors='ignore'), data['location'],
                     data['place'], data['lang']])


# main invoked here
main()
