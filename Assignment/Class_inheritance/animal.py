class Animal () :

    def __init__(self, color, name, speak = None) :
        self.color = color
        self.name = name
        self.__speak = speak
    def get_name (self) :
        print(self.name)  
    
    def set_name(self, name) :
        self.name = name

    def get_speak (self) :
        print(self.__speak)

    def set_speak (self, speak) :
        self.__speak = speak

    def get_color(self) :
        print(self.color)

    def set_color(self, color) :
        self.color = color


class Dog (Animal):
    
    def __init__ (self, name, color = None) :
        Animal.__init__(self, color, name, "Bark")
        self.__legs = 4

    def set_legs(self, legs) :
        self.__legs = legs

    def get_legs(self) :
        print(self.__legs)

class Cat (Animal) :

    def __init__(self, name, color = None) :
        Animal.__init__(self, color, name, "Meow") 
        self.__legs = 4

    def set_legs(self, legs) :
        self.__legs = legs

    def get_legs(self, legs) :
        print(self.__legs)

class Monkey (Animal) :

    def __init__(self, name, color = None) :
        Animal.__init__(self, name, color)
        self.__legs = 2

    def set_legs(self, legs) :
        self.__legs = legs

    def get_legs(self) :
        print(self.__legs)


class Elephant (Animal) :

    def __init__ (self, name, color = None) :
        Animal.__init__(self, name, color) 
        self.__legs = 4

    def set_legs(self, legs) :
        self.__legs = legs

    def get_legs(self) :
        print(self.__legs)


class Gorilla (Animal) :

    def __init__ (self, name, color = None) :
        Animal.__init__(self, name, color, "Groans") 
        self.__legs = 2

    def set_legs(self, legs) :
        self.__legs = legs

    def get_legs(self) :
        print(self.__legs)

class Tiger (Animal) :
    
    def __init__ (self, name, color = None) :
        Animal.__init__(self, name, color, "Roar")
        self.__legs = 4

    def set_legs(self, legs) :
        self.__legs = legs

    def get_legs(self) :
        print(self.__legs)

class Lion (Animal) :

    def __init__ (self, name, color = None) :
        Animal.__init__(self, name,  color,  "Roar") 
        self.__legs = 4

    def set_legs (self, legs) :
        self.__legs = legs

    def get_legs (self, legs) :
        print(self.__legs)


class Rabbit (Animal) :

    def __init__ (self, name, color = None) :
        Animal.__init__(self, name,  color)
        self.__legs = 4

    def set_legs (self, legs) :
        self.__legs = legs

    def get_legs (self, legs) :
        print(self.__legs)


class Bear(Animal) :

    def __init__ (self, name, color = None) :
        Animal.__init__(self, name,  color,  "Roar") 
        self.__legs = 2

    def set_legs (self, legs) :
        self.__legs = legs

    def get_legs (self, legs) :
        print(self.__legs)


class XYZ (Animal) :

    def __init__ (self, name, color = None) :
        Animal.__init__(self, name,  color) 
        self.__legs = 4

    def set_legs (self, legs) :
        self.__legs = legs

    def get_legs (self, legs) :
        print(self.__legs)

d = Dog("Sheero")
print(d.get_speak())
