class Shape () {
    def __init__ (self, perimeter, area) :
        self.__perimeter = perimeter
        self.__area = area

    def get_perimeter (self) :
        print(self.__perimeter)

    def get_area (self) :
        print(self.__area)

}

def Circle(Shape) :

    def __init__(self, radius) :
        self.__radius = radius
        self.__perimeter = 2 * 3.14 * radius
        self.__area = 3.14 * radius * radius
        Shape.__init__(self.__perimeter. self.__area)

    def get_radius (self) :
        print(self.__radius)
        
def Square (Shape) :

    def __init__ (self, side) :
        self.__side = side 
        self.__perimeter = 4 * side
        self.__area = area * area
        Shape.__init__(self.__perimeter, self.__area)

    def get_dimmensions(self) :
        print(self.__side)
 
def Rectangle (Shape) :

    def __init__(self, length, breadth) :
        self.__length = length
        self.__breadth = breadth
        Shape.__init__(2 * (self.__length + self.__breadth), length * breadth)

    def get_dimmensions(self) :
        print(self.__length, selg.__breadth)

def Eq_Triangle (Shape) :

    def __init__(self, side) :
        self.__side = side
        Shape.__init__(3 * side, (3 ** 0.5) * (side ** 2))

    def get_dimmension (self) :
        print(self.__side)

def Iso_Triangle (Shape) :

    def __init__ (self, base, side) :
        self.__base = base
        self.__side = side
        Shape.__init__(2 * side + base ,  0.5 * pow((side ** 2 - base ** \
            2)/4, 1/2) * base )
    
    def get_dimmensions(self) :
        print(self.__side, self.__base)

def Hexagon (Shape) :

    def __init__ (self, side) :
        self.__side = side
        Shape.__init__(6 * side, 3 * (3 ** 0.5) * (side ** 2))

    def get_dimmensions(self) :
        print(self.__side)


