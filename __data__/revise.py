import json
import geocoder

orignalJson = None
newJson = {}
with open("data.json", "r") as f:
  orignalJson = json.loads(f.read())

for counter in range(0, len(orignalJson)):
    try:
        g = geocoder.here(orignalJson[counter]["Nationality"],app_id='DA1Z4YGFPP1CgZfq4mB9',app_code='4FHp0V77LSCZ6On60TsM_g')
        newJson[counter] = orignalJson[counter]
        newJson[counter]["Latitude"] = g.latlng[0]
        newJson[counter]["Longitude"] = g.latlng[1]
        print(str(counter) + "----------" + str(newJson[counter]["ID"]))
    except Exception as e:
        print(e)
        pass

with open("dataV2.json", "w") as u:
  json.dump(newJson, u)
  print("File update complete!")
