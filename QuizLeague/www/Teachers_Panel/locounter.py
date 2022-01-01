import os
# -*- coding: utf-8 -*-

def printf(string):
    print(string)

UnicodeDecodeError_List = list()
FileNotFoundError_List = list()
def LocCounter(Directory=None):
    if(Directory==None):
        cwd = os.getcwd()
    else:
        cwd=Directory

    for filename in os.listdir(cwd):
        if os.path.isdir(filename):
            LocCounter(os.getcwd()+"/"+filename+"/")
            continue
        try:
            with open(cwd+"/"+filename,"r") as  tempobject:
                lines = len(tempobject.readlines())
                print("file "+tempobject.name+" lines -> "+str(lines))


        except FileNotFoundError:
            #printf("Check "+filename+" permissions (i cant open it!!)")
            FileNotFoundError_List.append(filename)
        except UnicodeDecodeError:
            #printf("UnicodeError!! check file! -> "+filename)
            UnicodeDecodeError_List.append(filename)
        except IsADirectoryError:
            pass
def Stats():
    if len(UnicodeDecodeError_List)>0:
        printf("\t\tTheese files could not be loaded...")
        for i in UnicodeDecodeError_List:
            printf("\t\t\t\t"+i)
    if len(FileNotFoundError_List)>0:
        printf("\t\tTheese files could not be opened(run me as sudo maybe? )")
        for i in FileNotFoundError_List:
            printf("\t\t\t\t" + i)


LocCounter()
Stats()