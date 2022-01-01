import os
import threading
# -*- coding: utf-8 -*-

def printf(string):
    print(string)

SumOfAllLines = 0
ThreadQueue = list()

class RecvThread (threading.Thread):
    def __init__(self,cwd=None):
        threading.Thread.__init__(self)
        if(cwd==None):
            self.cwd=os.getcwd()
        else:
            self.cwd=cwd
        self.UnicodeDecodeError_List = list()
        self.FileNotFoundError_List = list()
        self.LoadedFilesError_List = list()
    def run(self):
        self.Locounter()
    def Locounter(self):
        for i in os.listdir(self.cwd):
            if(os.path.isdir(i)):
                ThreadQueue.append(RecvThread(os.getcwd()+"/"+i))
                ThreadQueue[len(ThreadQueue)-1].start()
            else:
                try:
                    with open(self.cwd+"/"+i,"r") as tempfileobject:
                        global SumOfAllLines
                        ThisFileHas = len(tempfileobject.readlines())
                        SumOfAllLines += ThisFileHas
                        printf("File "+i+" has "+str(ThisFileHas)+" Lines of code ")
                except FileNotFoundError:
                    self.FileNotFoundError_List.append(i)
                except UnicodeDecodeError:
                    self.UnicodeDecodeError_List.append(i)
                except IsADirectoryError:
                    pass


def show_stats():
    for i in ThreadQueue:
        i.join()
    for i in ThreadQueue:
        if (len(i.FileNotFoundError_List) > 0):
            printf("Thread from directory " + i.cwd + "Refers that theese files not found!")
            for j in i.FileNotFoundError_List:
                printf(" File " + j)
        else:
            printf("Thread from directory " + i.cwd + "Refers that all files found successfully!")
    printf("*----------------------------------------------------------------------------------*")
    for i in ThreadQueue:
        if (len(i.UnicodeDecodeError_List) > 0):
            printf(
                "Thread from directory " + i.cwd + "Refers that theese files could not be opened(images or sound files maybe? )!")
            for j in i.UnicodeDecodeError_List:
                printf(" File " + j)
        else:
            printf("Thread from directory " + i.cwd + "Refers that all files opened corectly!")
    printf("Total Amount of lines of code is.... -> "+str(SumOfAllLines))


ThreadQueue.append(RecvThread())
ThreadQueue[0].start()
show_stats()