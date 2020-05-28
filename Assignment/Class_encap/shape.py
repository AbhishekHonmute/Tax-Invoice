
class Circle () :
    def __init__(self, radius) :
        self.__no_of_sides = 0
        self.radius = radius
        self.__perimeter = 2 * 3.14 * radius 
        self.__area = 3.14 * radius * radius

    def change_dimmensions(self, n_radius) :
        self.radius = n_radius
        self.__change_perimeter(radius)
        self.__change_area(radius)
    
    def __change_perimeter(self, radius) :
        self.__perimter = 2 * 3.14 * radius

    def __change_area(self, radius) :
        self.__area = 3.14 * radius * radius

    def get_perimeter(self) :
        print(self.__perimeter)
    
    def get_area(self) :
        print(self.__area)

    def __del__(self): 
        pass


class Square() :
    def __init__(self, side) :
        self.__no_of_sides = 4
        self.side = side
        self.__perimeter = 4 * side
        self.__area = side * side

    def change_dimmensions(self, n_side) :
        self.side = n_side
        self.__change_perimeter(side)
        self.__change_area(side)
    
    def __change_perimeter(self, side) :
        self.__perimeter = 4 * side

    def __change_area(self, side) :
        self.__area = side * side

    def get_perimeter(self) :
        print(self.__perimeter)
    
    def get_area(self) :
        print(self.__area)

class Rectangle() :
    def __init__(self, length, breadth) :
        self.__no_of_sides = 4
        self.length = length
        self.breadth = breadth
        self.__perimeter = 2 * (length + breadth)
        self.__area = length * breadth

    def change_dimmension(self, length, breadth) :
        self.length = length
        self.breadh = breadth
        self.__change_perimeter(length, breadth)
        self.__change_area(length, breadth)
    
    def __change_perimeter(self, side) :
        self.__perimeter = 2 * (length + breadth)

    def __change_area(self, side) :
        self.__area = length * breadth

    def get_perimeter(self) :
        print(self.__perimeter)
    
    def get_area(self) :
        print(self.__area)
    def __init__(self, side) :
        self.__no_of_sides = 3
        self.side = side
        self.__perimeter = 3 * side
        self.__area = pow(3, 1/2) * side * 0.5

    def change_dimmension(self, side) :
        self.side = side
        self.__change_perimeter()
        self.__change_area()
    
    def __change_perimeter(self) :
        self.__perimeter = 3 * self.side

    def __change_area(self) :
        self.__area = pow(3, 1/2) * self.side * 0.5

    def get_perimeter(self) :
        print(self.__perimeter)
    
    def get_area(self) :
        print(self.__area)

 
class Iso_Triangle() :
    def __init__(self, equal_side, base) :
        self.__no_of_sides = 3
        self.equal_side = side
        self.base = base
        self.__perimeter = 2 * equal_side + base
        self.__area = 0.5 * pow((equal_side ** 2 - base ** 2)/4, 1/2) * base 

    def change_dimmension(self, equal_side, base) :
        self.equal_side = equal_side
        self.base = base
        self.__change_perimeter()
        self.__change_area()
    
    def __change_perimeter(self) :
        self.__perimeter = 2 * self.equal_side + base

    def __change_area(self) :
        self.__area =  0.5 * pow((equal_side ** 2 - base ** 2)/4, 1/2) * base 

    def get_perimeter(self) :
        print(self.__perimeter)
    
    def get_area(self) :
        print(self.__area)


class Reg_Hexagon () :
    def __init__(self, side) :
        self.__no_of_sides = 6
        self.side = side
        self.__perimeter = 6 * side
        self.__area = pow(3, 1/2) * side * 3 

    def change_dimmension(self, side) :
        self.side = side
        self.__change_perimeter()
        self.__change_area()
    
    def __change_perimeter(self) :
        self.__perimeter = 6 * self.side

    def __change_area(self) :
        self.__area = pow(3, 1/2) * self.side * 3

    def get_perimeter(self) :
        print(self.__perimeter)
    
    def get_area(self) :
        print(self.__area)

   
