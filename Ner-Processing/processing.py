import nltk
import numpy
from nltk.corpus import stopwords

from nltk.tokenize import word_tokenize
from collections import Counter
from nltk.tokenize import word_tokenize
from nltk import word_tokenize, pos_tag, ne_chunk
from nltk.stem import WordNetLemmatizer
from nltk.corpus import stopwords
from nltk.stem import PorterStemmer


# nltk.download('wordnet')  #download if using this module for the first time
# nltk.download('averaged_perceptron_tagger')
# nltk.download('punkt')
# nltk.download('maxent_ne_chunker')

def remove_stopwords(text):
    stop_words = set(stopwords.words('english'))

    word_tokens = tokenization(text)

    filtered_sentence = [w for w in word_tokens if not w in stop_words]
    sentence = ''
    for word in filtered_sentence:
        sentence = sentence + ' ' + word
    return sentence


def tokenization(text):
    return nltk.word_tokenize(text)


def posTagg(text):
    return nltk.pos_tag(text)


def chunking(text):
    res_chunk = ne_chunk(text)
    chunk_list = []
    for x in str(res_chunk).split('\n'):
        if '/NN' in x:
            chunk_list.append(x)
    return chunk_list

def stemming(text):
    words_tokens = tokenization(text)
    ps = PorterStemmer()

    for word in words_tokens:
        print(ps.stem(word))


def preprocessText(text):
    # Remove stopwords
    text_clean = remove_stopwords(text)

    # Word Tokenization
    text_tokenized = tokenization(text_clean)

    # POS tagging
    text_tagged = posTagg(text_tokenized)

    # Chunking
    chunk_list = chunking(text_tagged)

    return chunk_list

# stemming(
#     "Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, "
#     "produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. The movie features an "
#     "ensemble cast including Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, and others. (Source: "
#     "wikipedia).")
print(preprocessText(
    "Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, "
    "produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. The movie features an "
    "ensemble cast including Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, and others. (Source: "
    "wikipedia)."))
# preprocessText("Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the
# Avengers, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. The movie features an
# ensemble cast including Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, and others. (Source:
# wikipedia).")
