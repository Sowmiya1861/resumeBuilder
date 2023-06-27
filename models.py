from sqlalchemy.schema import Column
from sqlalchemy.types import String, Integer
from database import Base,db_engine

class Signup(Base):
    __tablename__ = "signup"

    id = Column(Integer, primary_key=True, index=True)
    name = Column(String(30))
    email = Column(String(30))
    password = Column(String(30))
    cpassword = Column(String(30))
    
Base.metadata.create_all(bind=db_engine)