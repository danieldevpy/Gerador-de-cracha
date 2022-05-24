from typing import Union
from fastapi import FastAPI, UploadFile, File
from fastapi.responses import RedirectResponse
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import gerador


class Badge(BaseModel):
    unity: str
    name: str
    job: str
    cpf: str
    rg: str
    registration: str
    photo: str


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


@app.get("/")
def start():
    return RedirectResponse('/docs')


@app.get("/search")
def search_badge():
    answer = gerador.search()
    return answer


@app.post('/create')
def create_badge(create: Badge):
    answer = gerador.create(
                    create.unity, create.name, create.job, create.cpf, create.rg, create.registration, create.photo)
    return answer

@app.post('/join')
def join_badge(values: list):
    answer = gerador.join(values)
    return answer


@app.post('/delete')
def delete_badge(values: list):
    answer = gerador.delete(values)
    return answer


