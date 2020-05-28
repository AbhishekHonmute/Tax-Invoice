try :
    '''Here I am trying to write in a file which has the permission only to
    read from it and it raises an IOError '''
    fob = open("sample.txt", 'w')
    fob.write("I have written succesffuly into this file")
except IOError:
    print("The file is not present in this directory ot unable to read from \
file")
else :
    print("The write operation is successful")
