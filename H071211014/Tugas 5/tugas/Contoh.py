import re 

contoh = "Baag"
isCocok = re.match("^B$", contoh)

if (isCocok):
    print("Cocok")
else: 
    print("Tidak Cocok")