from PIL import Image, ImageFont, ImageDraw
import os
import time


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


def new(unity, name, charge, cpf, rg, registration):
    inicio = time.time()
    path_image= f'crachas/{cpf}.png'
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

        resposta = 'cisbaf'

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

        resposta = 'upa'

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
        verse = Image.open(r'crachas/triagem-verso.png')

        resposta = 'Triagem'


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
    front.save(rf'cracha_gerado/{cpf}-frente.png')
    verse.save(rf'cracha_gerado/{cpf}-verso.png')
    # removendo foto que foi usada da pasta raiz
    os.remove(path_image)
    fim = time.time()

    return f'o cartão do {resposta} foi gerado! Finalizado em {str(inicio - fim)[1:4]} segundos'



