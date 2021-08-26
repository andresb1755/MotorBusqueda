import nltk
nltk.download("all")
import pandas as pd
import numpy as np
import re
from nltk.tokenize import word_tokenize
from nltk import pos_tag
from nltk.corpus import stopwords
from nltk.stem import WordNetLemmatizer
from collections import defaultdict
from nltk.corpus import wordnet as wn
from sklearn.feature_extraction.text import TfidfVectorizer
import json
import warnings
import math
f = open("DocentesProcesados.json", "r")
c = f.read()
docentes = json.loads(c)
Keys = docentes.keys()
news = pd.DataFrame(columns=['Subject','content', 'cc'])
cont = 0
for i in Keys:
  Nom = docentes[i]["Nombre"]
  Desc = docentes[i]["Descripción"]
  cc = docentes[i]["CC"]
  news = news.append({'Subject': f'{Nom}', 'content' : f'{Desc}', 'cc': f'{cc}'},ignore_index=True)
#Eliminación Palabras No Deseadas Dataset
df_news =news[['Subject','content', 'cc']]
df_news.content =df_news.content.replace(to_replace='from:(.*\n)',value='',regex=True) ##remove from to email 
df_news.content =df_news.content.replace(to_replace='lines:(.*\n)',value='',regex=True)
df_news.content =df_news.content.replace(to_replace='[!"#$%&\'()*+,/:;<=>?@[\\]^_`{|}~]',value=' ',regex=True) #remove punctuation except
df_news.content =df_news.content.replace(to_replace='-',value=' ',regex=True)
df_news.content =df_news.content.replace(to_replace='\s+',value=' ',regex=True)    #remove new line
df_news.content =df_news.content.replace(to_replace='  ',value='',regex=True)                #remove double white space
df_news.content =df_news.content.apply(lambda x:x.strip())  # Ltrim and Rtrim of whitespace

#Data To LoweCase
df_news['content']=[entry.lower() for entry in df_news['content']]
#Separar Palabras Data
df_news['Word tokenize']= [word_tokenize(entry) for entry in df_news.content]
#WordLemmatizer
def wordLemmatizer(data):
    tag_map = defaultdict(lambda : wn.NOUN)
    tag_map['J'] = wn.ADJ
    tag_map['V'] = wn.VERB
    tag_map['R'] = wn.ADV
    file_clean_k =pd.DataFrame()
    for index,entry in enumerate(data):
        
        # Declaring Empty List to store the words that follow the rules for this step
        Final_words = []
        # Initializing WordNetLemmatizer()
        word_Lemmatized = WordNetLemmatizer()
        # pos_tag function below will provide the 'tag' i.e if the word is Noun(N) or Verb(V) or something else.
        for word, tag in pos_tag(entry):
            # Below condition is to check for Stop words and consider only alphabets
            if len(word)>1 and word not in stopwords.words('spanish') and word.isalpha():
                word_Final = word_Lemmatized.lemmatize(word,tag_map[tag[0]])
                Final_words.append(word_Final)
            # The final processed set of words for each iteration will be stored in 'text_final'
                file_clean_k.loc[index,'Keyword_final'] = str(Final_words)
                file_clean_k.loc[index,'Keyword_final'] = str(Final_words)
                file_clean_k=file_clean_k.replace(to_replace ="\[.", value = '', regex = True)
                file_clean_k=file_clean_k.replace(to_replace ="'", value = '', regex = True)
                file_clean_k=file_clean_k.replace(to_replace =" ", value = '', regex = True)
                file_clean_k=file_clean_k.replace(to_replace ='\]', value = '', regex = True)
    return file_clean_k
df2=wordLemmatizer(df_news['Word tokenize'].head(100))
#Terminos Frecuencia
## Create Vocabulary
vocabulary = set()
for doc in df2.Keyword_final:#Clean_Keyword:
  vocabulary.update(doc.split(','))
vocabulary = list(vocabulary)
# Intializating the tfIdf model
tfidf = TfidfVectorizer(vocabulary=vocabulary)
# Fit the TfIdf model
tfidf.fit(df2.Keyword_final)
# Transform the TfIdf model
tfidf_tran=tfidf.transform(df2.Keyword_final)

#Vector Query (Coseno)
def gen_vector_T(tokens):
  Q = np.zeros((len(vocabulary)))    
  x= tfidf.transform(tokens)
  #print(tokens[0].split(','))
  for token in tokens[0].split(','):
      #print(token)
      try:
        ind = vocabulary.index(token)
        Q[ind]  = x[0, tfidf.vocabulary_[token]]
      except:
       pass
  return Q
#Función de similitud de coseno para el cálculo
def cosine_sim(a, b):
    cos_sim = np.dot(a, b)/((np.linalg.norm(a)*np.linalg.norm(b)))
    return cos_sim
#Documento b / n de similitud de coseno con función de consulta
def cosine_similarity_T(k, query):
    preprocessed_query = preprocessed_query = re.sub("\W+", " ", query).strip()
    tokens = word_tokenize(str(preprocessed_query))
    q_df = pd.DataFrame(columns=['q_clean'])
    q_df.loc[0,'q_clean'] =tokens
    q_df['q_clean'] =wordLemmatizer(q_df.q_clean)
    d_cosines = []
    query_vector = gen_vector_T(q_df['q_clean'])
    for d in tfidf_tran.A:
        d_cosines.append(cosine_sim(query_vector, d))               
    out = np.array(d_cosines).argsort()[-k:][::-1]
    d_cosines.sort()
    a = pd.DataFrame()
    for i,index in enumerate(out):
        #a.loc[i,'index'] = str(index)
        a.loc[i,'Subject'] = df_news['Subject'][index]
        a.loc[i,'cc'] = df_news['cc'][index]
    for j,simScore in enumerate(d_cosines[-k:][::-1]):
       if math.isnan(simScore):
           simScore = 0
       a.loc[j,'Score'] = simScore
    return a
#IGNORAMOS LOS WARNINGS 
warnings.filterwarnings("ignore")
data = (cosine_similarity_T(10,'Profesional del area de la metalurgia y materiales'))
print(data)
df = pd.DataFrame(data = data)
df['Subject'] = df['Subject'].str.replace("\u00a0", " ")
df['Subject'] = df['Subject'].str.encode("utf8").str.decode("ascii","ignore")
result = df.to_json(orient="index")
parsed = json.loads(result)
parsed = json.dumps(parsed, ensure_ascii=True ,indent=4)  
f = open("ResulBusqueda.json", "w")
f.write(parsed)