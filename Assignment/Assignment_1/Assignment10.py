start_a = int(input("Enter the first number of the series"))

diff_r = int(input("Enter the geometric difference"))

l = []

for i in range(10) :
    term = start_a * diff_r ** i
    l.append(term)

print(l)
