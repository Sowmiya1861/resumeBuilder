from fastapi import FastAPI,Request,Depends,Form
from fastapi.templating import Jinja2Templates
from fastapi.responses import RedirectResponse
from database import SessionLocal
from sqlalchemy.orm import Session
from models import Base
import models

obj=FastAPI()
templates = Jinja2Templates(directory='templates')

def get_db():
    db = None
    try:
        db = SessionLocal()
        yield db
    finally:
        db.close()


@obj.get('/get_form')
def get_form(request:Request,db:Session = Depends(get_db)):
    return templates.TemplateResponse("signup.html",context={"request":request})

@obj.post("/create_data")
def create_data(request:Request,db:Session=Depends(get_db),name:str=Form(...), email:str=Form(...),password:str=Form(...), cpassword:str=Form(...)):
    body=models.Login(name=name,email=email,password=password,cpassword=cpassword)
    db.add(body)
    db.commit()
    return RedirectResponse("/get_form",status_code=303)
