import random

num = random.randint(-100000, 100000)

for i in range(3) :
    guess = int(input("Enter your number\n"))
    if(guess == num) :
        print("Congragulations you have guessed the number!!!!")
        break
    else :
        if(i == 0) :
            if(guess > num) :
                print("Number is less than your guess")
            else :
                print("Number is greater than your guess")
        elif(i == 1) :
            if(guess > num) :
                print("Number is less than your guess")
            else :
                print("Number is greater than your guess")
        else :
            print("You have used your 3 chances....Sorry!:)))")

