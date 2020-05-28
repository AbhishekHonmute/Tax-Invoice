def find_factors(num) :
    l = []
    for i in range(int(num / 2)) :
        if( num % (i + 1) == 0) :
            l.append(i + 1)
    return l

def sum_of_list(l) :
    sum = 0
    for i in l :
        sum += i
    return sum

k = 1

for i in range(10000000) :
    for j in range(int(i * 2)) :
        if(k == 10) :
            break
        #print("try", i + 1, j + i)
        list_of_factors_i = find_factors(i + 1)
        sum_of_factors_i = sum_of_list(list_of_factors_i)
        list_of_factors_j = find_factors(j + i)
        sum_of_factors_j = sum_of_list(list_of_factors_j)
        #print(sum_of_factors_j, sum_of_factors_i)
        if(sum_of_factors_i == j + i) :
            if(sum_of_factors_j == i + 1) :
                if(i + 1 != j + i) :
                    print(i + 1, j + i)
                    k = k + 1
     


