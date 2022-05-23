from datetime import date
from typing import Union
from fastapi import FastAPI, UploadFile, File
import shutil
import gerador



app = FastAPI()


@app.get("/")
def read_root():
    return {"Hello": "World"}



@app.post('/gerar')
def cracha(unidade: str, nome: str, cargo: str, cpf: int, rg: int, mat: int, file: UploadFile = File(...)):
    with open(f'crachas/{cpf}.png', 'wb') as buffer:
        shutil.copyfileobj(file.file, buffer)

    resposta = gerador.new(unidade, nome, cargo, str(cpf), str(rg), str(mat))

    return resposta
