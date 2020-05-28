from sympy.matrices import Matrix
x = input("Enter the number of variables")
print("Enter the coefficients of equations :")
print("if equation ax+by+cz = d then enter a b c d as input")
l = []
v = []
for i in range(0, int(x)):
	c = [int(k) for k in input().split()]
	v.append(c[-1])
	del c[-1]
	l.append(c)
l = Matrix(tuple(l))
v = Matrix(tuple(v))
print(list(l.LUsolve(v)))

