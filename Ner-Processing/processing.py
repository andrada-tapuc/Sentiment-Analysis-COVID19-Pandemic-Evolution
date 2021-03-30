import nltk
from nltk import word_tokenize, pos_tag, ne_chunk
from nltk.stem import WordNetLemmatizer
# nltk.download('wordnet')
from nltk.corpus import stopwords
from nltk.stem import PorterStemmer


# nltk.download('averaged_perceptron_tagger')
# nltk.download('punkt')
# nltk.download('maxent_ne_chunker')


def sentenceTokenization(text):
    return nltk.sent_tokenize(text)

def wordTokenization(text):
    return nltk.word_tokenize(text)


def removeStopwords(text):
    stop_words = set(stopwords.words('english'))
    word_tokens = wordTokenization(text)
    filtered_words = [w for w in word_tokens if not w in stop_words]
    return filtered_words

def lowercaseWords(words):
    lowercase_words = [w.lower() for w in words]
    return lowercase_words

def stemming(text):
    ps = PorterStemmer()
    stemmed_words = [ps.stem(word) for word in text]
    return stemmed_words

def lemmatization(text):
    lemmatizer = WordNetLemmatizer()
    lemmatized_words = [lemmatizer.lemmatize(word) for word in text]
    return lemmatized_words

def posTagg(text):
    return nltk.pos_tag(text)

def chunking(text):
    res_chunk = ne_chunk(text)
    return res_chunk

def preprocessText(text):
    # Tokenization and Remove stopwords
    filtered_words = removeStopwords(text)

    # Lowercase Words
    lowercase_words = lowercaseWords(filtered_words)

    # Stemming
    stemming_words = stemming(filtered_words)

    # Lemmatization
    lemmatized_words = lemmatization(filtered_words)

    # POS tagging
    text_tagged = posTagg(lemmatized_words)

    # Chunking
    chunk_list = chunking(text_tagged)

    return chunk_list

# stemming(
#      "Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, "
#      "produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. The movie features an "
#      "ensemble cast including Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, and others. (Source: "
#      "wikipedia).")
print(preprocessText(
      "Avengers: Endgame is  :) a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, "
      "produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. The movie features an "
      "ensemble cast including Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, and others. (Source: "
      "wikipedia)."))
# preprocessText("Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the "
#  "Avengers, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. The movie features an "
#  "ensemble cast including Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, and others. (Source: "
#  "wikipedia).")
