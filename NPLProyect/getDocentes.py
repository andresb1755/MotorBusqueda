import nltk
nltk.download("all")
import pandas as pd
import nltk 
from bs4 import BeautifulSoup
import requests
import json
xls = pd.ExcelFile('../NPLProyect/Docentes.xlsx')
nombres=["Docente",	"Identificacion",	"Facultad",	"Nivel de Formacion",	"Titulo",
         "Institucion",	"Año Graduacion",	"Tipo de Vinculacion",	"Categoria Colciencias 781",	
         "Categoria Colciencias 833 (preliminar)",	"Categoria Minciencias 833",	"Grupo", "CvLAC"]
df = pd.read_excel(xls, 'Todos', header=9, usecols="A:M",names=nombres) 
vector= df['Identificacion']
df_CvLAC = pd.DataFrame(columns=['IdentificacionCvLAC'])
dff = pd.DataFrame(columns=['Nombre','Descripción'])
contCvLacs = 0
longitud= len(vector)
CvLACatedra = 0
CC = ""
URL = ""
#ObtenemosDocentesConCvLAC
def get_LinkCVLAC(cedula):
    URL = f"https://sba.minciencias.gov.co/Buscador_HojasDeVida/busqueda?q='{cedula}'&pagenum=1&start=0&type=load"
    page = requests.get(URL)
    soup = BeautifulSoup(page.content, 'html.parser')
    rqst = soup.find(id='link_res_0')
    if not (rqst==None):
      link=rqst.attrs['href']
      link = link.replace('%3F', '?')
      link = link.replace('%3D', '=')
      return link,cedula
    else:
      return "NoCvLAC",CC
Docentes= {}
for i in range(longitud):
  contCvLacs = contCvLacs +1
  URL,CC = get_LinkCVLAC(vector[i])
  if URL != "NoCvLAC":
      Docentes[contCvLacs] =({'CC': CC, 'CvLAC':URL})
      print(f'Docentes {i} añadido al archivo Json')
DictF = json.dumps(Docentes, indent = 3)
print(DictF)
f = open("Docentes.json", "w")
f.write(DictF)

