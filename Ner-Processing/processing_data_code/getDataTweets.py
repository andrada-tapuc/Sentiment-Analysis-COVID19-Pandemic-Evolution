import pandas as pd
import os
import csv
import glob

# Creates a JSON Files with the API credentials
# with open('api_keys.json', 'w') as outfile:
#     json.dump({
#     "consumer_key":CONSUMER_KEY,
#     "consumer_secret":CONSUMER_SECRET_KEY,
#     "access_token":ACCESS_TOKEN_KEY,
#     "access_token_secret": ACCESS_TOKEN_SECRET_KEY
#      }, outfile)

# Chunking full_data
j = 0
for i, chunk in enumerate(pd.read_csv('dailies/full_dataset_clean.tsv', chunksize=10000)):
    if i % 400 == 0:
        chunk.to_csv('data_chunks/dataset_clean_chunk{}.tsv'.format(j), index=False)
        j = j + 1
        print(j)

# Chunking final hydrated tweets
i = 3
while i < 65:
    file = "dataset_clean_chunk" + str(i) + ".tsv"
    outputFile = "file"
    i += 1
    os.system("python SMMT/get_metadata.py -i data_chunks/" + file + " -o total_hydrated/" + outputFile + " -k api_keys.json")


Dir = "total_hydrated"
Avg_Dir = "total_hydrated"

csv_file_list = glob.glob(os.path.join(Dir, '*.csv'))
print(csv_file_list)

with open(os.path.join(Avg_Dir, 'Output.csv'), 'w', newline='', encoding='utf-8') as f:
    wf = csv.writer(f, lineterminator='\n')

    for files in csv_file_list:
        with open(files, 'r', encoding='utf-8') as r:
            next(r)
            rr = csv.reader(r)
            for row in rr:
                wf.writerow(row)
