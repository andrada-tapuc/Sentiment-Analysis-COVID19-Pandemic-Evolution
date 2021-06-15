import csv
from wordcloud import WordCloud
import matplotlib.pyplot as plt


def plotCloudWords(file):
    word_list = ""
    with open(file, 'r', encoding='utf-8') as r:
        rr = csv.reader(r)
        for row in rr:
            if len(row) > 0:
                word_list = word_list + ' ' + row[0]
    print(word_list)
    wordcloud = WordCloud().generate(word_list)
    plt.imshow(wordcloud, interpolation='bilinear')
    plt.axis("off")
    plt.show()


plotCloudWords('total_extracted_tweets-1gram.csv')