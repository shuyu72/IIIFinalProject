#!/usr/bin/env python
# coding: utf-8

# In[1]:


# coding: utf-8
def fdavalue(list1):
    if len(list1)<2:
        return 'non','non','non'
    #print(list1)
    ptotal=0
    dtotal=0
    xc=[]
    yc=[]
    xytotal=0.0
    isqut=0
    getbu=0
    getbd=0
    getb=0.0
    geta=0
    sdwp=0
    strt=""
    listf=[1,1,1,1,1]
    for i in range(len(list1)-1):
        if(list1[i]<list1[i+1]):
            if(listf[i]==1):
                listf[i]+=0.006
                listf[i+1]-=0.005
            else:
                listf[i]+=0.001
                listf[i]-=0.006
    #print(listf)
    for i in range(len(list1)):
        list1[i]=list1[i]*listf[i]    
    for i,list1i in enumerate(list1):
        ptotal+=list1i
        dtotal+=i
    padv=ptotal/len(list1)
    dadv=dtotal/len(list1)
    for i,li in enumerate(list1):
        xc.append(i-dadv)
        yc.append(li-padv)
    for i,li in enumerate(list1):
        xytotal+=i*li
    for i,li in enumerate(list1):
        isqut+=i**2
    getbu=len(list1)*xytotal-ptotal*dtotal
    getbd=len(list1)*isqut-dtotal**2
    getb=getbu/getbd
    geta=padv+getb*dadv
    sdwp=geta+getb*len(list1)
    if(getb>0.02):
        strt='有上漲趨勢'
    elif((getb<=0.02) & (getb >-0.01)):
        strt='價格持平，趨勢準備反轉'
    else :
        strt='已進入下跌階段'
        
    sdwp=round(sdwp,2)
    getb=round(getb,2)
    
    return sdwp,getb,strt


# In[2]:


import pymysql
conn = pymysql.connect(host='localhost', user='root', passwd='p@ssw0rd', db='stock', charset='utf8')
#host=localhost,port=未更動,user=*未知*,passwd=*未知*,db=*未知*,charset=utf-8#
cursor = conn.cursor()
#建立滑鼠指標
str1='select companyID from stock.stock_title'
cursor.execute(str1)
CompanySelect=cursor.fetchall()
#print(CompanySelect)
CompanySelectlist=list(CompanySelect)
CompanyIDlist=[]
for i in CompanySelectlist:
    CompanyIDlist+=list(i)
#print(CompanyIDlist)
arr2=list(map(eval,CompanyIDlist))
#print(CompanyIDlist)
for companyIDs in CompanyIDlist:
    #print(companyIDs)
    ClosingPriceList=[]
    ClosingPrice=[]
    str2=""
    str2="select closing_price from stock.stock_data where companyID={} and date between date_add(date_add(CURRENT_DATE(),INTERVAL -1911 YEAR),interval -14 day) and date_add(CURRENT_DATE(),INTERVAL -1911 YEAR) limit 5 ;".format(companyIDs)
    cursor.execute(str2)
    tpl2 = cursor.fetchall()
    #print(tpl2)
    ClosingPriceList=list(tpl2)
    for i in ClosingPriceList:
        ClosingPrice+=list(i)
    print(ClosingPrice)
    while '--' in ClosingPrice: 
        ClosingPrice.remove('--')
    for i in range(len(ClosingPrice)):
        ClosingPrice[i]=ClosingPrice[i].replace(',','')
    #print(ClosingPrice)
    ClosingPrice=list(map(eval,ClosingPrice))
    #print(ClosingPrice)
    Prediction=fdavalue(ClosingPrice)
    print('------>',Prediction)
    str3="UPDATE analysis SET price='{}' ,slupe='{}' ,clusion='{}' WHERE companyID={} ;".format(Prediction[0],Prediction[1],Prediction[2],companyIDs)
    #print(str3)
    try:
        cursor.execute(str3)
        conn.commit()
    except:
        conn.rollback()
conn.close()
    
#update table set price=%d ,slupe=%d,slupe=%d,clusion=%s where companyId=?


# In[ ]:




