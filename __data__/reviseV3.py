import json
import os
v2Json = None
playerJson = None
newJson = {}
jsonFinalDump = []
with open("dataV2.json", "r") as f:
  v2Json = json.loads(f.read())
with open("__crawler__/player_descriptions.json", "r") as f:
  playerJson = json.loads(f.read())

for counter in range(0, len(v2Json)):
    try:
        v2Json[str(counter)].pop('', None)
        playerId = v2Json[str(counter)]['ID']
        description = playerJson[str(playerId)]["description"]
        newJson[str(counter)] = v2Json[str(counter)]
        newJson[str(counter)]["description"] = description
        jsonFinalDump.append(newJson[str(counter)])
        print(str(counter) + "----------" + str(newJson[str(counter)]["ID"]))
        #os.system('wget '+str(newJson[str(counter)]["Club Logo"])+" -O clubs/"+str(newJson[str(counter)]["ID"])+".png")
    except Exception as e:
        print(str(counter) + "<--COULD NOT FIND DESCRIPTION, DID NOT ADD TO LIST")
        pass

with open("dataV4.json", "w") as u:
  json.dump(jsonFinalDump, u)
  print("File update complete!")
