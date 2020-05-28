#on the right bank
rbank = ["grass", "goat", "lion"]

#on the left bank
lbank = []

#boat 
boat = ["man"]

#valid_case returns 1 if the transition is valid 
def valid_case(boat, bank) :
    if (("grass" in boat and "lion" in bank) or ("lion" in boat and "grass" in
            bank)) :
        return 1
    if (len(bank) == 0  or len(bank) == 1) :
        return 1
    return 0

i = 0
while True :
        member = rbank[i]
        if (len(boat) == 2) :
            member_var = boat.pop()
            rbank.append(member_var)
            print("%s moved from boat to right bank" %(member_var))       
        boat.append(member)
        rbank.remove(member)
        if(valid_case(rbank, rbank) == 1):
            boat.remove(member)
            #rbank.remove(member)
            lbank.append(member)
            print("%s moved from right bank to boat" %(member))
            print("%s moved from boat to left bank" %(member))
            if(valid_case(lbank, lbank) == 0 and len(lbank) >  1 and len(lbank)
                    < 3) :
                member_var = lbank.pop(0)
                boat.append(member_var)
                print("%s moved from left bank to boat" %(member_var))
        else :
            rbank.append(boat.pop())
        if len(lbank) == 3  and len(rbank) == 0:
           break
