# -*- coding: utf-8 -*-
#noinspection ByPep8
#Lets import some libs!
"""
    EIC -> External Implemented class
    IIC -> Internal Implemented class
    SA -> Static Method
    NSA -> Non-static Method (optional)
"""
import MySQLdb
import smtplib
import threading
import json
import time
#creating mutex lock for sunchronise threads
mutex=threading.Lock()



class OpenErrorFile():
    def __init__(self):
        pass

class ErrorHandle():
    def __init__(self,msg):
        self.___msg=msg
    def GetErrorMessage(self):
        return self.___msg
    def PrintLog(self):
        print('[LOG]'+self.GetErrorMessage())
"""
ConfigsCantLoadedError is a Error
    Throws by ConfigsLoader Class
    When Configs file (located config/config.json could not be opened
@:arg
    msg -> The message description
@:*Methods*
    GetErrorMessage -> return the string of description of message
"""
class ConfigsCantLoadedError(Exception,ErrorHandle):
    def __init__(self, msg):
        ErrorHandle.__init__(self,msg)

"""
MethodWhoNeedsEmailCalledError is a Error
    Throws by DatabaseConnection
    When you try to use the following methods without predefine email parameter (on constructor)
        -> plus_one_into_counter()
        -> define_as_sended()
@:arg
    msg -> The message description
@:*Methods*
    GetErrorMessage -> return the string of description of message
"""
class MethodWhoNeedsEmailCalledError(Exception,ErrorHandle):
    def __init__(self,msg):
        self.___msg=msg
        ErrorHandle.__init__(self,msg)


"""
DatabaseFailsToConnectError is a Error
    Throws by DatabaseConnection
    When you to connect into Mysql database and connection error happened (Mysql.Error)
@:arg
    msg -> The message description
@:*Methods*
    GetErrorMessage -> return the string of description of message
"""
class DatabaseFailsToConnectError(Exception,ErrorHandle):
    def __init__(self,msg):
        self.___msg=msg
        ErrorHandle.__init__(self,msg)


class DefineAsSendedError(Exception,ErrorHandle):
    def __init__(self,msg):
        self.___msg=msg
        ErrorHandle.__init__(self,msg)


class PlusOneIntoCounterError(Exception,ErrorHandle):
    def __init__(self,msg):
        self.___msg=msg
        ErrorHandle.__init__(self,msg)


class MoreThanOneSameEmailsError(Exception,ErrorHandle):
    def __init__(self,msg):
        self.___msg=msg
        ErrorHandle.__init__(self,msg)



class CantGetEmailListError(Exception,ErrorHandle):
    def __init__(self,msg):
        self.___msg=msg
        ErrorHandle.__init__(self,msg)




"""
ConfigsCantLoadedError is a Error
    Throws by ConfigsLoader Class
    When Configs file (located config/config.json could not be opened
@:arg
    msg -> The message description
@:*Methods*
    GetErrorMessage -> return the string of description of message
"""
class ConfigsLoader:
    Configs=None
    def __init__(self):
        if(ConfigsLoader.Configs==None):
            ConfigsLoader.ConfigsLoader_INITIALIZER()

    @staticmethod
    def ConfigsLoader_INITIALIZER():
        try:
            with open('config/config.json','r') as configsfile:
                text=configsfile.read()
                ConfigsLoader.Configs = json.loads(text)
        except IOError:
            assert ConfigsCantLoadedError


"""
DatabaseConnection is a class
    Implements all communication with database
@:uses
    (EIC)MySQLdb lib for Communication With Database
    (III)ConfigsLoader for access the configs file
@:*Methods*
   DatabaseConnection_Configs_INITIALIZER -> Initialise the ConfigsLoader Object
   MySQLdbObject_INITIALIZER              -> Initialise the Database by creating the connection
   reset_cursor                           -> Re_create the cursor object and clears the buffer
   get_emails_list                        -> Returns a 2D array with form {{email1,salt1},{email2,salt2} .. ,{email_n},saltn}
   define_as_sended                       -> Defines in database that an email is sended in self.email destination
   plus_one_into_counter                  -> Adds one into the number of tries of sending email :P :P :P
@:*Attritudes*
    (SA)MySQLdbObject = Static Attritude , the MySQLdb Object witch implements the communication !
    (SA)ConfigsObject = The Object witch stores all the config information!
    (SA)ThrowsExceptionLevel = The error level
        ***ThrowsExceptionLevel Possible Values***
            0 -> No Exceptions Raised (Be careful with that!)
            1 -> All Exceptions Throw (Develepoment Mode)

@:raises
    ConfigsCantLoadedError      -> When cant open config file
    DatabaseFailsToConnectError -> when database error occurs
    DefineAsSendedError         -> when sended update query fails
    PlusOneIntoCounterError     -> when plus into counter of tries fails!
    MoreThanOneSameEmailsError  -> when two or more same emails detect! :O
"""
class DatabaseConnection:
    MySQLdbObject = None
    ConfigsObject = None
    ThrowsExceptionLevel = 1


    @staticmethod
    def MySQLdbObject_INITIALIZER():
        try:
            DatabaseConnection.MySQLdbObject=MySQLdb.connect(
                DatabaseConnection.ConfigsObject.Configs['dbaddress'],
                DatabaseConnection.ConfigsObject.Configs['dbusername'],
                DatabaseConnection.ConfigsObject.Configs['dbpassword'],
                DatabaseConnection.ConfigsObject.Configs['dbname'],)
        except MySQLdb.Error as ErrorObject:
            if(DatabaseConnection.ThrowsExceptionLevel==1):
                raise DatabaseFailsToConnectError("MySQL database fail to connect")


    @staticmethod
    def DatabaseConnection_Configs_INITIALIZER():
        try:
            DatabaseConnection.ConfigsObject = ConfigsLoader()
        except ConfigsCantLoadedError:
            if DatabaseConnection.ThrowsExceptionLevel==1:
                raise ConfigsCantLoadedError('Configs on Database connection cant load')


    def __init__(self,email=None):
        if DatabaseConnection.ConfigsObject == None:
            DatabaseConnection.DatabaseConnection_Configs_INITIALIZER()
        if DatabaseConnection.MySQLdbObject==None:
            DatabaseConnection.MySQLdbObject_INITIALIZER()
        self.___Cursor_Object = DatabaseConnection.MySQLdbObject.cursor()
        if(email!=None):
            self.email=email
        else:
            self.email=None



    def __del__(self):
        DatabaseConnection.MySQLdbObject.commit()
        del self.___Cursor_Object

    def reset_cursor(self):
        del self.___Cursor_Object
        self.___Cursor_Object = DatabaseConnection.MySQLdbObject.cursor()
        self.MySQLdbObject.commit()


    def get_emails_list(self):
        try:
            self.___Cursor_Object.execute("select email,salt from teachers where sendemail=0;")
        except MySQLdb.Error:
            if(self.ThrowsExceptionLevel==1):
                raise CantGetEmailListError("[WARN]Cant Load the emails list !")
            return []
        return self.___Cursor_Object.fetchall()



    def define_as_sended(self):
        try:
            self.___Cursor_Object.execute("update teachers set sendemail=1 where email='"+self.email+"';")
            if self.___Cursor_Object.rowcount>1 and self.ThrowsExceptionLevel==1:
                raise MoreThanOneSameEmailsError('Email '+self.email+'exist '+self.___Cursor_Object.rowcount+" times!!")
            self.MySQLdbObject.commit()
        except MySQLdb.Error as ErrorObject:
            self.___Cursor_Object.rollback()
            if self.ThrowsExceptionLevel==1:
                raise DefineAsSendedError('Cant Define As Sended at email '+self.email)
        except AttributeError:
            if self.ThrowsExceptionLevel==1:
                raise MethodWhoNeedsEmailCalledError('define_as_sended called only if you give email in constructor method')


    def plus_one_into_counter(self):
        try:
            self.___Cursor_Object.execute("update teachers set attemttosendemail=attemttosendemail+1 where email='"+self.email+"' limit 1;")
            self.MySQLdbObject.commit()
        except MySQLdb.Error as ErrorObject:
            self.___Cursor_Object.rollback()
            raise PlusOneIntoCounterError("Cant plus into counter at email"+self.email)
        except AttributeError:
            raise MethodWhoNeedsEmailCalledError('plus_one_into_counter called only if you give email in constructor method')


"""
EmailHandle is a class
    Implements all Email Sending (Runs on Thread)
@:uses
    (EIC)smtplib -> to send emails
@:*Methods*
   EmailHandle_smtpObj_INITIALIZER -> Initialise the ConfigsLoader Object
   send_verifycation_email              -> Initialise the Database by creating the connection

@:*Attritudes*
    (SA)smtpObj   -> the connection to gmail's object
    (NSA)email    -> the email in string to handle!
    (NSA)salt     -> the salt string to sent!
    (NSA)tid      -> the pseudo-thread-id

@:raises
    None!
"""

class EmailHandle:
    smtpObj=None
    @staticmethod
    def EmailHandle_smtpObj_INITIALIZER():
        try:
            EmailHandle.smtpObj = smtplib.SMTP('smtp.gmail.com:587')
            EmailHandle.smtpObj.ehlo()
            EmailHandle.smtpObj.starttls()
            EmailHandle.smtpObj.login('quizleaguebeta@gmail.com', 'Akm#)1H7')
        except smtplib.SMTPConnectError:
            print("Cant Connect into gmails server!!")
        except smtplib.SMTPAuthenticationError:
            print("Check Username and password,server kicked me out! :O ")
    def send_verifycation_email(self):

        msg=''.join([
            'From:quizleaguebeta@gmail.com',
            'To:'+self.email,
            'Subject:Your Account Verifycation\n\n\n',
            'http://quizzleague.freebsdworld.gr/Teachers_Panel/SignIn/VerifyAccount/index.php?id='+self.salt])

        DatabaseConnectionObject = DatabaseConnection(self.email)
        try:
            EmailHandle.smtpObj.sendmail('From:quizleaguebeta@gmail.com','To:'+self.email,msg)
        except:
            print('\t\t[TID=' + str(self.tid) + ']Mail Cant Send on -> ' + self.email)


    def __init__(self, email, salt,tid):
        self.email=email
        self.salt=salt
        self.tid=tid
        if(EmailHandle.smtpObj==None):
            EmailHandle.EmailHandle_smtpObj_INITIALIZER()


"""
CreateNewEmailBot
    Implements The Actually Email Bot
@:uses
    (IIC)ConfigsLoader ()
    (IIC)DatabaseConnection()

@:*Methods*
   start() -> Starts The bot!
   stop()  ->Kills The Bot ()
   reload_configs() -> Reload the configs file

@:*Attritudes*
    (NSA)ConfigObject  Is the object keeping all the configurations!
    (NSA)DatabaseObject is the object who implements the communication in mysql database
    (NSA)ThreadID is the counter who gives pseudo-id in threads!
    (NSA)ApplicationStopFlag
        (NSA)ApplicationStopFlag possible values
            1) True -> The App keeps Runn'n
            2) False -> The app dies (break the inf loop!)


@:raises
    None!
"""

class CreateNewEmailBot:
    def __init__(self):
        self.ConfigsObject = ConfigsLoader()
        self.DatabaseObject = DatabaseConnection()
        self.ThreadID = 0
        self.ApplicationStopFlag=False
    def start(self):
        self.ApplicationStopFlag=0
        while(True):
            self.ThreadList = list()
            self.DatabaseObject.reset_cursor()
            for email_list in self.DatabaseObject.get_emails_list():
                self.ThreadID+=1
                tempThreadObject = NewEmailThread(email_list[0], email_list[1], self.ThreadID,mutex)
                self.ThreadList.append(tempThreadObject)
                tempThreadObject.start()
            for join_thread in self.ThreadList:
                join_thread.join()

            time.sleep(self.ConfigsObject.Configs['loop_delay'])
            if self.ApplicationStopFlag:
                break
    def stop(self):
        self.ApplicationStopFlag=True
    def reload_configs(self):
        pass


"""
NewEmailThread is a class witch implements the thread mechanism
"""
class NewEmailThread(threading.Thread):
    def __init__(self,email,salt,tid,mutex):
        self.email=email
        self.salt=salt
        self.tid=tid
        self.EmailHandleObject=None
        self.mutex=mutex
        threading.Thread.__init__(self)
    def run(self):
        self.EmailHandleObject=EmailHandle(self.email,self.salt,self.tid)
        self.mutex.acquire()
        self.EmailHandleObject.send_verifycation_email()
        #Create A temp Database Connection object to define as sended
        TempDatabaseObject = DatabaseConnection(self.email)
        TempDatabaseObject.plus_one_into_counter()
        TempDatabaseObject.define_as_sended()

        self.mutex.release()

"""
AppThread is a class witch implements the thread mechanism
"""
class AppThread(threading.Thread):
    def __init__(self,Obj):
        threading.Thread.__init__(self)
        self.Obj=Obj
    def run(self):
        self.Obj.start()

"""
UserInspectorClass is a class witch implements the thread mechanism
"""
class UserInspectorClass:
    def __init__(self):
        self.AppObject = CreateNewEmailBot()
        self.NewAppThread=None
        print("Welcome to Quizleague Email Bot ")
        print("Version 0.0.2")

        while(True):

            com = raw_input("Inspector Ready ->")
            if(com=='start'):

                self.NewAppThread = AppThread(self.AppObject)
                self.NewAppThread.start()
                print('Application Started! :) ')
            if (com=='stop'):
                if self.NewAppThread==None:
                    print("To stop the application,you must start it yo!")
                else:
                    self.AppObject.stop()
                    self.NewAppThread.do_run=False
                    del self.NewAppThread
                    print("The application stoped successfully!")

            if(com=='exit'):
                print("Bye!! :) ")
                del self
                break

NewUser=UserInspectorClass()
