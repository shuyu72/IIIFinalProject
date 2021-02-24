#!/usr/bin/env python
# -*- coding: utf-8 -*



import requests
from bs4 import BeautifulSoup
import os
import time
import pymysql
from datetime import datetime


def get_conn():
  conn = pymysql.connect(host='localhost', port=3306, user='root', passwd='p@ssw0rd', db='stock', charset='utf8')
  return conn
def insert(cur, sql, args):
  cur.execute(sql, args)
conn = get_conn()
cur = conn.cursor()
create_table="CREATE TABLE IF NOT EXISTS news_data_BBC(day date, news_title varchar(512),link varchar(512),src varchar(15),content varchar(3096),img_url varchar(512))"
cur.execute(create_table)







res = requests.get("https://www.bbc.com/zhongwen/trad/business")
res.encoding = 'utf-8'
soup = BeautifulSoup(res.content, 'html.parser')
items = soup.findAll('div', {"class":"eagle-item__body" })
print("items")
print(items)
count=0
for item in items:
    if item.find("span",{"class":"title-link__title-text"})is None:
        continue
    else:
        title=item.find("span",{"class":"title-link__title-text"}).text
        print('title')
        print(title)
    if item.find("a",{"class":"title-link"},"href") is None:
        continue
    else:
        href=item.find("a",{"class":"title-link"},"href")
        href=str(href).replace('<a class="title-link" href=', '')
        href=str(href).replace('<h3 class="title-link__title">', '')
        href=str(href).replace('<span class="title-link__title-text">', '')
        href=str(href).replace('</span>', '')
        href=str(href).replace('</h3>', '')
        href=str(href).replace('</a>', '')
        href=str(href).replace('>', '')
        href=str(href).replace('\n', '')
        href=str(href).replace(title, '')
        href=str(href).replace('"', '')
        href="https://www.bbc.com"+href
        print('href')
        print(href)
        content_res = requests.get(href)
        content_res.encoding = 'utf-8'
        content_soup = BeautifulSoup(content_res.content, 'html.parser')
        content_items = content_soup.findAll('p',{"class":""})
        test_items = content_soup.find('p',{"class":""}).text
        remove_items=content_soup.find('p',{"class":""})
        print('remove redundent')
        print(remove_items)
        content_items=str(content_items).replace(str(remove_items), '')
        content_items=str(content_items).replace('<p>', '    ')
        content_items=str(content_items).replace('</p>', '\n\n')
        content_items=str(content_items).replace(',', '')
        content_items=str(content_items).replace('[', '')
        content_items=str(content_items).replace(']', '')
        content_items=str(content_items).replace('<strong class="RegularFigureList__Impact-n4skma-0 njWsc">', '‧')
        content_items=str(content_items).replace('<span class="BaseText-w2isnj-0 cTwvAN">','')
        content_items=str(content_items).replace('</strong>','\n')
        content_items=str(content_items).replace('</span>','\n')
        content_items=str(content_items).replace('<strong>','')
        content_items=str(content_items).replace('<i>','')
        content_items=str(content_items).replace('</i>','')
        print('content_items')
        print(content_items)
        headers = {'User-Agent': 'Mozilla/5.0'}
        response = requests.get(href,headers = headers) #使用header避免訪問受到限制
        soup = BeautifulSoup(response.content, 'html.parser')
        img_items = soup.find('img',{"class":"js-image-replace"})
        html = requests.get(img_items.get('src')) # use 'get' to get photo link path , requests = send request
        img_url=img_items.get('src')
        print('img_url')
        print(img_url)
        sql='replace into news_data_BBC values(%s,%s,%s,%s,%s,%s)'
        args=(str(datetime.today().strftime('%Y-%m-%d')),title,href,'BBC',content_items,img_url)
        insert(cur,sql=sql,args=args)
    
conn.commit()
cur.close()
conn.close()

