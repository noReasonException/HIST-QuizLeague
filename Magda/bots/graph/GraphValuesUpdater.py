import MySQLdb
import time
print '**GraphValuesUpdater version 0.1**'


with open('GraphValuesBotConfigs.ini','r') as configs:
	for values in configs.readlines():
		exec(values)
		print values
s = MySQLdb.connect('localhost',usr,pswd,dbname);
cursor = s.cursor()
previous_value = 0

print '|Range-|RequestsPerMinute-|PreviousValue-|'
firsttime=True

file_write = """
{
	"pressure":"NULL"
}
"""
while(1):
	tempWrite = file_write
	cursor.execute('select * from errors;')
	diafora = cursor.rowcount-previous_value
	perminute = int(diafora*60)/UpdateRate
	previous_value = cursor.rowcount

	if(firsttime):
		firsttime=False
		continue

	print " "*1,diafora," "*10,perminute," "*12,previous_value
	s.commit()
	time.sleep(UpdateRate)
	tempWrite = tempWrite.replace('NULL',str(perminute))
	with open('../../www/Dashboard/values.txt','w') as values_file:
		values_file.write(str(tempWrite))
	
