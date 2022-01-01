import MySQLdb
import os
import time
def init():
	global connectionObject,connectionObjectCursor 
	connectionObject = MySQLdb.connect('localhost','root','12312312345','sch')
	connectionObjectCursor = connectionObject.cursor()

def create_table():
	global connectionObject,connectionObjectCursor 
	connectionObjectCursor.execute('create table tempUsers(username varchar(64),points int(11));')
	connectionObject.commit()

def drop_table():
	global connectionObject,connectionObjectCursor 
	connectionObjectCursor.execute('drop table tempUsers;')
	connectionObject.commit()

def make_copy():
	global connectionObject,connectionObjectCursor 
	global connectionObjectCursorTemp
	connectionObjectCursorTemp = connectionObject.cursor()

	connectionObjectCursor.execute('select username,points from users;')

	for row in connectionObjectCursor.fetchall():
		connectionObjectCursorTemp.execute('insert into tempUsers (username,points) values("'+row[0]+'","'+str(row[1])+'");')
		connectionObject.commit()

def delete_table():
	global connectionObject,connectionObjectCursor
	connectionObjectCursor.execute('delete from tempUsers;')
	connectionObject.commit()
def block(username):
	global connectionObject,connectionObjectCursor
	connectionObjectCursor.execute('update users set isBlocked=1 where username="'+username+'";')
	connectionObject.commit()

def compare(average):
	flag = True
	global connectionObjectCursor,connectionObjectCursorTemp
	connectionObjectCursorTemp = connectionObject.cursor()
	connectionObjectCursor.execute('select username,points from users;')
	connectionObjectCursorTemp.execute('select username,points from tempUsers;')
	counter=connectionObjectCursorTemp.rowcount
	while(counter>0):
		counter-=1
		tempUsers = connectionObjectCursorTemp.fetchone()
		users = connectionObjectCursor.fetchone()
		if(str(users[0])==str(tempUsers[0])):
			if(int(users[1])-int(tempUsers[1])>average):
				print 'USER -> '+users[0]+'has more than 1000 points average in less than 10 mims!'
				block(users[0])
				flag=False
	return flag

		


def start():
	delay = input('delay in mins')
	average = input('average')
	init()
	try:
		create_table()
	except:
		drop_table()
		create_table()
	while(1):
		delete_table()
		make_copy()
		time.sleep(delay*60)
		print 'CHECK LOOP STARTED'
		if(compare(average)):
			print 'Everything is okay!'
		


start()