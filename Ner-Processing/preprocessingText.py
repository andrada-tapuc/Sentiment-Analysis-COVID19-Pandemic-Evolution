import nltk
import string
from nltk import ne_chunk
from nltk.stem import WordNetLemmatizer
from nltk.corpus import stopwords
from nltk.stem import PorterStemmer
from nltk.tokenize import TweetTokenizer


# nltk.download('wordnet')
# nltk.download('averaged_perceptron_tagger')
# nltk.download('punkt')
# nltk.download('maxent_ne_chunker')

def removePunctuation(text):
    text_clean = "".join([i for i in text if i not in string.punctuation])
    return text_clean


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


def chunking2(tagged_words):
    chunk_to_be_extracted = r''' Chunk: {<DT>*<NNP>*<NN>*}'''
    chunkParser = nltk.chunk.RegexpParser(chunk_to_be_extracted)
    chunked_sentence = chunkParser.parse(tagged_words)
    # To view the NLTK tree
    # chunked_sentence.draw()
    print('Chunks obtained: \n')
    for subtree in chunked_sentence.subtrees():
        if subtree.label() == 'Chunk':
            print(subtree)


def preprocessText(text):
    # Remove Punctuation
    text = removePunctuation(text)

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

    # Chunking2
    return lemmatized_words


def clean_text_special_characters(initial_text):
    text = removeStopwords(initial_text)
    cleanText = str(text)
    # Remove urls
    cleanText = re.sub(r"http\S+", '', cleanText)

    # Change special characters and delete irrelevant words
    cleanText = re.sub('b\'', '', cleanText)
    cleanText = re.sub('\"b\"', '', cleanText)
    cleanText = re.sub('\"b\'', '', cleanText)
    cleanText = re.sub('[1-90]+', '', cleanText)
    cleanText = re.sub('[^a-zA-z ]', '', cleanText)
    cleanText = re.sub('(\b[a-zA-z]{3}\b)', '', cleanText)

    cleanText = cleanText.strip()
    if cleanText != '':
        return cleanText.lower()


