import re
n = input()
ipv4 = input()
ipv6 = input()

if (re.search(n)):
    print("Bukan IP addres")
    if (re.search(ipv4)):
        patter =  "^(25[0-5]| 2[0-4][0-9]|1[0-9]|[0-9][1-9]?[0-9]\.) $",re.split(".")
        print("IPv4")
    else:
        print("Bukan IP address")
    if (re.search(ipv6)):
        pattern = "[0-9]{4}re.split(:)\.[a-z]{0,32}"
        print("IPv6")
    else:
        print("Bukan IP address")
