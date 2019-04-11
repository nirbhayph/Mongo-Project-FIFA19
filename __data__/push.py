import os
dir = "/usr/fifa/Mongo-Project-FIFA19/__data__/clubs"
for file in os.listdir(dir):
    print(file)
    os.system('mongofiles -d clublogosphotos put clubs/'+str(file))
