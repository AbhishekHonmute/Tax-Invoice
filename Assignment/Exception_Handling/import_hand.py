try :
    #I am trying to import an module which is not present on this machine
    #therefore it will raise an error unable to import the module
    import itertools 
except :
    print("Unable to import the module")
else :
    print("Module imported successfully")

