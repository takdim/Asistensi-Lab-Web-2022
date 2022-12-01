class Kubus:
    def __init__(self,lebar,tinggi,panjang):
        self.lebar = lebar
        self.tinggi = tinggi
        self.panjang = panjang
    
    def setLebar(self,lebar):
        self.lebar = lebar
    def setTinggi(self,tingi):
        self.tinggi = tinggi
    def setPanjang(self,panjang):
        self.panjang = panjang
    def setMassa(self,massa):
        self.massa = massa
    def getMassaJenis(self):
        volume = self.panjang*self.lebar*self.tinggi
        p = self.massa/volume
        return p

lebar = float(input())
tinggi = float(input())
panjang = float(input())
massa = float(input())

kubus = Kubus(lebar,tinggi,panjang)

kubus.setMassa(massa)
print("Massa Jenis =", kubus.getMassaJenis())

kubus.setMassa(massa*2)
print("Massa Jenis = ", kubus.getMassaJenis())
    