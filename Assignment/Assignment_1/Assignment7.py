upper_range = int(input("Enter the upper range\n"))
lower_range = int(input("Enter the lower range\n"))
i = lower_range
while(1) :
    if (i > upper_range) :
        break
    int_str = str(i)
    sum_digits = 0
    for alpha in str(i) :
        sum_digits += (int)(alpha) ** 3
    if(sum_digits == i) :
        print(i)
    i = i + 1
