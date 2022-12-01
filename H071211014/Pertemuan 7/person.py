class Person:
   def __init__(self, age, name, gender):
      self.age = age
      self.name = name 
      self.gender = gender
   
   def setName(self,name):
      self.name = name
   def getName(self):
      return self.name
   def setAge(self,age):
      self.age = age
   def getAge(self):
      return self.age
   def setGender(self,gender):
      self.gender = gender
   def getGender(self):
      return self.gender


data = Person(19, 'attar', 'laki-laki')
print(data.getName())
print(data.getAge())
print(data.getGender())
data.setName('attar')
print(data.getName())
