import nltk
nltk.download("all")
from bs4 import BeautifulSoup
import urllib.request
import json
def Procesamiento(URL, nom,desc):
  URL = URL 
  contIP = 0
  flagIP=False
  flagFA = False
  flagAA = False
  flagLen = False
  Descripción = ""
  NombreInves = ""
  estado = 0
  contFlag = 1
  contPreg = 0
  vecCarreas = ['doctorado','especialización', 'maestría', 'magister']
  vecAreas = ['ciencias','ingeniería','pregrado/universitario']   
  vecIdiomas = ['alemán','italiano','serbocroata','inglés', 'mandarín', 'hindi', 'español', 'francés','árabe','bengalí','ruso','portugués','indonesio']
  response = urllib.request.urlopen(URL)
  html = response.read()
  soup = BeautifulSoup(html,"html5lib")
  text = soup.get_text(strip=False)
  for lines in text.splitlines():
      lines=lines.lstrip()
      texto = lines.lower()
      flagLen = True
      if flagLen and len(texto)>1:
          for pos,i in enumerate (vecIdiomas):
              if i in texto:
                  if texto not in Descripción:
                      Descripción = Descripción + '\n' + texto
      if (estado == 0):
        if 'nombre' in texto:
          flagIP =True
        if flagIP and len(text)>1 and contIP < 1:
           if (texto != 'nombre'):
            if texto not in NombreInves:
              NombreInves = texto
              estado = 1
              contIP = contIP+1
      if ('idiomas' in texto):        
        contFlag = 0
      elif (contFlag != 0):
        if (estado == 1 or estado == 2 or estado == 3 or estado == 4 or estado == 5):
          if 'formación académica' in texto:
             flagFA =True;
          if flagFA and len(texto)>1:
            for pos,i in  enumerate(vecCarreas):
              if ((vecCarreas[pos] in texto and texto != vecCarreas[pos])):
                if texto not in Descripción:
                  Descripción = Descripción + '\n' + texto
                  estado = 2  
            if (('magister' in texto or 'maestría' in texto) and texto != 'maestría/magister'):
              if texto not in Descripción:
                Descripción = Descripción + '\n' + texto
                estado = 3
            if (texto != 'pregrado/universitario' and contPreg < 2):
              if ('ingeniería' in texto and texto != 'ingeniería'):
                if texto not in Descripción:
                  contPreg = 3
                  Descripción = Descripción + '\n' + texto
                  estado = 5
        if (estado == 1 or estado == 2 or estado == 3 or estado == 4 or estado == 5):
          if 'áreas de actuación' in texto:
            flagAA =True
          if flagAA and len(texto)>1:
             for pos,i in  enumerate(vecAreas):
              if ((vecAreas[pos] in texto and texto != vecAreas[pos])):
                  line = texto.split(" -- ")
                  for i in line:
                    if i not in Descripción:
                      Descripción = Descripción + '\n' + "- " + i        
  return URL,NombreInves,Descripción
URL = ""
Nom = ""
Desc = ""
print("-----------------------------")
print("PROCESANDO DATAFRAME DOCENTES")
print("-----------------------------")
f = open("Docentes.json", "r")
c = f.read()
docentes = json.loads(c)
KeysJson = docentes.keys()
for i in (KeysJson):
    URL = docentes[i]["CvLAC"]
    CC = docentes[i]["CC"]
    URL, Nom, Desc =Procesamiento(URL,Nom,Desc)
    str(Desc).encode('utf-8')
    Desc = Desc.replace("\n", " ") 
    docentes[i] =({'CC': CC,'Nombre': Nom, 'Descripción':Desc})
    DictF = json.dumps(docentes,ensure_ascii= False, indent = 3)
    f = open("DocentesProcesados.json", "w")
    f.write(DictF)
    print("Docente: " + i + " agregado.")

