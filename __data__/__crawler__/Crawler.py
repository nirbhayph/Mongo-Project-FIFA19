from bs4 import BeautifulSoup
from six.moves import urllib
import sys
import json
import traceback


if sys.version[0] == '2':
    reload(sys)
    sys.setdefaultencoding("utf-8")

def getSoup(url):
    user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.7) Gecko/2009021910 Firefox/3.0.7'
    headers={'User-Agent':user_agent,}
    request = None
    response = None
    data = None
    try:
        request=urllib.request.Request(url,None,headers)
        response =  urllib.request.urlopen(request)
        data = response.read()
        soup = BeautifulSoup(data, "html.parser")
        return soup
    except:
        pass

def getInfo(type, soup):
    items = soup.find_all("li")
    for listItem in items:
        if listItem.find("div",{"class":"info-label"}).find("span").get_text() == type :
            return listItem.find("div",{"class":"info"}).find("span").get_text()

pages = 603
players_list = []
for page in range(1, pages+1):
    try:
        url = "https://fifaindex.com/players/"+str(page)
        players_soup = getSoup(url)

        players = players_soup.find_all('tr')
        print str(page)+" Parsed"
        for player in players:
            try:
                players_list.append(player['data-playerid'])
            except:
                print "Did not find playerId"
    except:
        print str(page)+"----Not Parsed"


players_map = {}

for playerId in players_list:
    try:
        url = "https://www.fifaindex.com/player/"+str(playerId)
        player_soup = getSoup(url)

        description_soup = player_soup.find(attrs={"class": "row mt-5 d-lg-block d-none"})
        name = description_soup.find(attrs={"class": "card-header"}).text.strip().split("Player Stats ")[1]
        description = description_soup.find(attrs={"class": "card-body"}).text.strip()

        player_map = {
            "name":name,
            "description":description
        }

        players_map[playerId]=player_map
        print str(playerId)+str("-----------Recorded")
    except:
        print str(playerId)+str("-----------Not Recorded")

with open("player_descriptions.json","w") as file:
    json.dump(players_map, file)
