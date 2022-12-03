import re
string =  "Hello 1234. Welcome 4523 Kallo 1412"
pattern = '\d+'
result = re.findall(pattern, string)
print(result)