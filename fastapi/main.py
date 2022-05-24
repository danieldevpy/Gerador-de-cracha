from typing import Union
from fastapi import FastAPI, UploadFile, File
from fastapi.responses import RedirectResponse
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import gerador

origins = [
    "http://localhost/dados.php",
    "http://localhost",
    "http://localhost:8080",
    "http://localhost:80",
]

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

class Cracha(BaseModel):
    unidade: str
    nome: str
    cargo: str
    cpf: str
    rg: str
    matricula: str
    foto: str


@app.get("/")
def read_root():
    return RedirectResponse('/docs')


@app.get("/buscar")
def get_crachas_gerados():
    resposta = gerador.buscar_crachas()
    return resposta



@app.post('/gerar')
def post_cracha(gerar: Cracha):

    answer = gerador.new(gerar.unidade, gerar.nome, gerar.cargo, gerar.cpf, gerar.rg, gerar.matricula, gerar.foto)
    return answer

@app.post('/deletar')
def del_cracha(values: list):
    answer = gerador.deletar_crachas(values)
    return answer


