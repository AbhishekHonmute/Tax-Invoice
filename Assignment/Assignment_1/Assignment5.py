l = []
while(1) :
    num = input( "Enter the numbers you want to add for non- missing pages")
    if(num == 's') :
        break
    else:
        if(len(num) == 1):
            l.append(int(num))
        elif(len(num) == 2):
            l.append(int(num))
        else :
            if (len(num) == 3) :
                for i in range(int(num[2]) - int(num[0]) + 1) :
                    l.append(int(num[0]) + i)
            elif (len(num) == 4) :
                upper = num[2:4]
                lower = num[0]
                for i in range(int(upper) - int(lower) + 1) :
                    l.append(int(num[0]) + i)
            elif (len(num) == 5) :
                upper = num[3:5]
                lower = num[0:2]
                for i in range(int(upper) - int(lower) + 1) :
                    l.append(int(lower) + i)
print(l)
