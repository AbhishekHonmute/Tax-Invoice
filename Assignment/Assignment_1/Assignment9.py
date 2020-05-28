i = 1

count_of_numbers = 0
while(1) :
    if(count_of_numbers == 10) :
         break
    count_of_factors = 1
    sum_of_factors = 0
    for j in range(1, i // 2 + 1) :
        if( i % j == 0) :
            count_of_factors = count_of_factors + 1
            sum_of_factors += (1 / j)
    sum_of_factors += (1 / i)
    if(round((count_of_factors / sum_of_factors), 8) % 1 == 0) :
        print(i)
        count_of_numbers = count_of_numbers + 1
    i = i + 1

