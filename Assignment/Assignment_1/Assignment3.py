blocked_sites = ["www.facebook.com"]
host_path = r"/etc/hosts"
redirect = "127.0.0.1"
for sites in blocked_sites :
    with open(host_path, "r+") as fileptr :
        fileptr.write(redirect + " " + sites + '\n')
