from PIL import Image, ImageFont, ImageDraw
import os
import time
from zipfile import *
import datetime


def search():
    root_folder = r'cracha_gerado/'
    cpfs = []
    retornar = ''
    for root, dirs, files in os.walk(root_folder):
        for file in files:
            if file[0:11] not in cpfs:
                cpfs.append(file[0:11])
                retornar = f'{retornar},{file[0:11]}'
    return retornar[1:]


def join(dados):
    name_file = str(datetime.datetime.now())[11:19].replace(':', '')
    coord = [(100, 100), (900, 100), (1700, 100), (100, 1250), (900, 1250), (1700, 1250), (100, 2400), (900, 2400)]
    list = {}
    c = 0
    qtd = len(dados)

    for x in range(0, qtd):
        list[x + 1 + c] = r'cracha_gerado/' + dados[x] + '-frente.png'
        c = c + 1
        list[x + 1 + c] = r'cracha_gerado/' + dados[x] + '-verso.png'

    frente = Image.open(r'crachas/folha.png')
    qtd = len(list)
    try:
        for y in range(0, qtd):
            foto = Image.open(list[y + 1])
            frente.paste(foto, coord[y])
        frente.save('imprimir.png')
        with ZipFile(f'{name_file}.zip', "w") as myzip:
            myzip.write('imprimir.png')
        os.remove("imprimir.png")
        os.rename(rf'{name_file}.zip',
                  rf'C:\xampp\htdocs\impressao\{name_file}.zip')
    except :
        return 'Error'
    print(name_file)
    return f'{name_file}.zip'


def delete(values):
    root_folder = 'cracha_gerado'
    result = {'Excluidos': ''}
    for cpf in values:
        try:
            os.remove(rf'{root_folder}/{cpf}-frente.png')
            os.remove(rf'{root_folder}/{cpf}-verso.png')
            result['Excluidos'] = result['Excluidos'] + cpf + ','
        except:
            pass

    return result


def create(unity, name, charge, cpf, rg, registration, photo_user):
    start = time.time()
    path_image = rf'C:/xampp/htdocs/fotos/{photo_user}'
    redimensionar(path_image)
    color = (0, 0, 0)
    font = ImageFont.truetype(r'fontes/LinLibertine_R.ttf', 32)
    image = Image.open(path_image)

    if unity == 'Cisbaf':
        # caculando meio
        coordName = (calcular(name), 850)
        coordCargo = (calcular(charge), 910)
        coordRegistration = (calcular(registration) + 20, 195)
        coordCpf = (calcular(cpf) + 30, 325)
        coordRg = (calcular(rg) + 30, 450)

        # abrindo frente do cracha
        front = Image.open(r'crachas/cisbaf-frente.png')
        front.paste(image, (175, 345))
        verse = Image.open(r'crachas/cisbaf-verso.png')

    elif unity == 'Upa':
        # caculando meio
        coordName = (calcular(name), 780)
        coordCargo = (calcular(charge), 840)
        coordRegistration = (calcular(registration) + 10, 317)
        coordCpf = (calcular(cpf) + 30, 465)
        coordRg = (calcular(rg) + 30, 627)

        # abrindo frente do cracha
        front = Image.open(r'crachas/upa-frente.png')
        front.paste(image, (175, 305))
        verse = Image.open(r'crachas/upa-verso.png')

    elif unity == 'Triagem':
        # caculando meio
        coordName = (calcular(name), 850)
        coordCargo = (calcular(charge), 910)
        coordRegistration = (calcular(registration) + 20, 195)
        coordCpf = (calcular(cpf) + 30, 325)
        coordRg = (calcular(rg) + 30, 450)

        # abrindo frente do cracha
        front = Image.open(r'crachas/cisbaf-frente.png')
        front.paste(image, (175, 345))

    # ativando modo desenho
    design_front = ImageDraw.Draw(front)
    # escrevendo na imagem
    design_front.text((coordName), name, font=font, fill=color)
    design_front.text((coordCargo), charge, font=font, fill=color)
    # ativando modo desenho
    design_verse = ImageDraw.Draw(verse)
    # desenhando no verso
    design_verse.text((coordRegistration), registration, font=font, fill=color)
    design_verse.text((coordCpf), cpf, font=font, fill=color)
    design_verse.text((coordRg), rg, font=font, fill=color)

    front.save(rf'cracha_gerado/{cpf.replace(".", "").replace("-", "")}-frente.png')
    verse.save(rf'cracha_gerado/{cpf.replace(".", "").replace("-", "")}-verso.png')
    # removendo foto que foi usada da pasta raiz
    os.remove(path_image)
    end = time.time()

    return f'o cartão de {name} foi gerado! Finalizado em {str(start - end)[1:4]} segundos'


def redimensionar(name):
    img = Image.open(name)
    new_img = img.resize((322, 427), Image.LANCZOS)
    new_img.save(
        name,
        optimize=True,
        quality=50
    )


def calcular(texto):
    tamanho = float(len(texto)) * 18 / 2
    recalcular = 340 - tamanho
    return recalcular
