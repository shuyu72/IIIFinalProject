#!/usr/bin/env python
# -*- coding: utf-8 -*





import requests
from datetime import datetime
import os
import pymysql
import time
from bs4 import BeautifulSoup
import cv2
import base64


def get_conn():
  conn = pymysql.connect(host='23.101.12.30', port=3306, user='root', passwd='p@ssw0rd', db='stock', charset='utf8')
  return conn
def insert(cur, sql, args):
  cur.execute(sql, args)
conn = get_conn()
cur = conn.cursor()
create_table="CREATE TABLE IF NOT EXISTS news_data(day date, news_title varchar(512),link varchar(512),src varchar(15),content varchar(3096),image BLOB,max_img_url varchar(512))"
cur.execute(create_table)

res = requests.get("https://www.chinatimes.com/money/?chdtv")
res.encoding = 'utf-8'

content = res.content
soup = BeautifulSoup(content, "html.parser")
items = soup.findAll("h3", {"class": "title"})
#titles=[]
#hrefs=[]
print("items")
print(items)


count=0
max_imgs=[]
max_img_urls=[]
for item in items:
    url = item.find("a").get("href")
    res = requests.get(url)
    photolimit = 10
    headers = {'User-Agent': 'Mozilla/5.0'}
    response = requests.get(url,headers = headers) #使用header避免訪問受到限制
    soup = BeautifulSoup(response.content, 'html.parser')
    items = soup.find_all('img',{"class":"photo"})
    folder_path ='./photo/'+str(count)+'/'
    if (os.path.exists(folder_path) == False): #判斷資料夾是否存在
        os.makedirs(folder_path) #Create folder
    count+=1
    max_img='' 
    max_size=0
    max_img_url=''
    for index , item in enumerate (items):
        if (item and index < photolimit ):
            html = requests.get(item.get('src')) # use 'get' to get photo link path , requests = send request
            print('whether pic url')
            print(item.get('src'))
            img_name = folder_path + str(index + 1) + '.png'
            with open(img_name,'wb') as file: #以byte的形式將圖片數據寫入
                file.write(html.content)
                file.flush()        
                img = cv2.imread(img_name,0)
                if img is not None:
                    height, width = img.shape[:2]                             
                    print('\n')
                    print(height)
                    print(width)        
                    if height*width>max_size:
                        max_img=img_name
                        max_size=height*width
                        max_img_url=item.get('src')
                        
            file.close() #close file
            print('第 %d 張' % (index + 1))
            time.sleep(1)    
    print('max_img')
    print(max_img)
    print('max_size')
    print(max_size)
    max_imgs.append(max_img)
    max_img_urls.append(max_img_url)
    print('max_img_url')
    print(max_img_url)



res = requests.get("https://www.chinatimes.com/money/?chdtv")
res.encoding = 'utf-8'

content = res.content
soup = BeautifulSoup(content, "html.parser")
items = soup.findAll("h3", {"class": "title"})
#titles=[]
#hrefs=[]
print("items")
print(items)

count=0
for item in items:
    if item.find("a") is None:# or max_img_urls[count]=='':
        print('no a')
        continue
    else:
        title=item.find("a").text
        #titles.append(title)
        print('title')
        #print(title)
        href = item.find("a").get("href")
        res = requests.get(href)
        res.encoding = 'utf-8'




        headers = {'User-Agent': 'Mozilla/5.0'}
        response = requests.get(href,headers = headers) #使用header避免訪問受到限制
        #soup = BeautifulSoup(response.content, 'html.parser')
        #soup2 = BeautifulSoup(res.content, 'html.parser')
        soup2 = BeautifulSoup(response.content, 'html.parser')





        items2 = soup2.findAll('div', {"class":"article-body" })

        

        for item2 in items2:
            if item2.findAll("p") is None:
                continue
            else:
                content2=item2.findAll("p")
                content2=str(content2).replace('<p>', '    ')
                content2=str(content2).replace('</p>', '\n')
                content2=str(content2).replace(', ,', '\n')
                content2=str(content2).replace(',', '')
                content2=str(content2).replace('[', '    ')
                content2=str(content2).replace(']', '')
                print('content2')
                print(content2)
                #hrefs.append(href)
                #print('href')
                #print(href)
                folder_path ='./photo/'+str(count)+'/'
                if max_imgs[count]!='':
                    fin=open(max_imgs[count],"rb")

                    img=fin.read()
                    fin.close()
                    img_Contents = base64.b64encode(img)
                    img_Contents = str(img_Contents,'utf-8')

                    #sql='replace into news_data values(%s,%s,%s,%s,%s,"' + img_Contents + '\")'
                    sql='replace into news_data values(%s,%s,%s,%s,%s,%s,%s)'
                    args=(str(datetime.today().strftime('%Y-%m-%d')),title,href,'中國時報',content2,img_Contents,max_img_urls[count])
                    insert(cur,sql=sql,args=args)
                count+=1



print('Done')

conn.commit()
cur.close()
conn.close()










	
