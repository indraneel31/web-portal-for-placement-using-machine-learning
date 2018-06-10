import pymysql
import sys
name=sys.argv[1]
na=name.split('.')
con=pymysql.connect(host='localhost',user='root',password='',db='TestQuestions')
a=con.cursor()
sql='Create table '+na[0]+'(ques_no int AUTO_INCREMENT,ques_type int,corr_ans int,ques varchar(1000),opt1 varchar(100),opt2 varchar(100),opt3 varchar(100),opt4 varchar(100),primary key(ques_no));'
a.execute(sql)
#Machine Learning Starts here
    
import random
import tensorflow as tf
import tflearn
    #from .variables import variable
    #from tensorflow.contrib.framework.python.ops import add_arg_scope as contrib_add_arg_scope
import sys
import numpy as np
import unicodedata
from nltk.stem.lancaster import LancasterStemmer
from nltk import word_tokenize
import simplejson as json
tbl = dict.fromkeys(i for i in range(sys.maxunicode) if unicodedata.category(chr(i)).startswith('P'))
def remove_punctuation(text):
    return text.translate(tbl)
stemmer=LancasterStemmer()
data=None
with open('data.json') as json_data:
    data =json.load(json_data)
    print(data)
categories = list(data.keys())
words=[] 
docs=[]
for each_category in data.keys():
    for each_sentence in data[each_category]:
        each_sentence = remove_punctuation(each_sentence)
        print(each_sentence)
        w=word_tokenize(each_sentence)
        print("tokenized words:",w)
        words.extend(w)
        docs.append((w,each_category))
words=[stemmer.stem(w.lower()) for w in words]
words=sorted(list(set(words)))
print(words)
print(docs)
training=[]
output=[]
output_empty=[0]*len(categories)
for doc in docs:
    bow=[]
    token_words=doc[0]
    token_words=[stemmer.stem(word.lower()) for word in token_words]
    for w in words:
        bow.append(1) if w in token_words else bow.append(0)
    output_row=list(output_empty)
    output_row[categories.index(doc[1])]=1
    training.append([bow,output_row])
random.shuffle(training)
training=np.array(training)
train_x=list(training[:,0])
train_y=list(training[:,1])
tf.reset_default_graph()
net = tflearn.input_data(shape=[None,len(train_x[0])])
net=tflearn.fully_connected(net,8)
net=tflearn.fully_connected(net,8)
net = tflearn.fully_connected(net,len(train_y[0]),activation='softmax')
net=tflearn.regression(net)
model=tflearn.DNN(net,tensorboard_dir='tflearn_logs')
model.fit(train_x,train_y,n_epoch=1000,batch_size=8,show_metric=True)
model.save('model.tflearn')
def get_tf_record(sentence):
    global words
    sentence_words=word_tokenize(sentence)
    sentence_words=[stemmer.stem(word.lower()) for word in sentence_words]
    bow=[0]*len(words)
    for s in sentence_words:
        for i,w in enumerate(words):
            if w==s:
                bow[i]=1
    return (np.array(bow))
        
        
        
d={"Permutation & Combination":1,"Time & Work":2,"Time & Distance":3}
f=open(name,'r')
test=f.read()
#conn=pymysql.connect(host='localhost',user='root',password='',db='TestQuestions')
#b=conn.cursor()
for i in test.split('#^'):
    l=i.splitlines()
    v=categories[np.argmax(model.predict([get_tf_record(l[1])]))]
    m=(d[v])
    print(m)
    sq="INSERT INTO "+na[0]+"(`ques_type`, `corr_ans`, `ques`, `opt1`, `opt2`, `opt3`, `opt4`) \
	VALUES ('%s','%s','%s','%s','%s','%s','%s')"%((m),(l[6]),l[1],l[2],l[3],l[4],l[5])
    con.commit()
    a.execute(sq)
f.close()
a.close()
del a
con.close()
    