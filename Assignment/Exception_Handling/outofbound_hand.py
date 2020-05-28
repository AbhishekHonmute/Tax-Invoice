l1 = [10 ,50]
""" Here the size of the list l1 is 2 and im trying to copy a numer into the
list which is out of bound for the list"""
try : 
    l1[3] = 90
except IndexError:
    print("Out of bound")
else :
    print("The assignment is perfect")

