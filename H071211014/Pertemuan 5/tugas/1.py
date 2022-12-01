import re 

txt = input("Input kalimat anda: ")
pattern = "^a.*z$"

isMatch = re.match(pattern, txt)

if isMatch: 
    print("Katanya Cocok")
    
else: 
    print("Katanya tidak cocok")