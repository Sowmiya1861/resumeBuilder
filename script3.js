
// add button for Work Experience field
function addNewWeField() {
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('weField');
    newNode.classList.add('mt-2');
    newNode.setAttribute('rows',2);
    newNode.setAttribute('placeholder','Enter here');

    let weOb = document.getElementById('we');
    let weAddButtonOb = document.getElementById('weAddButton');

    weOb.insertBefore(newNode, weAddButtonOb);
}

// add button for Academic qualifiction field

function addNewAqField(){
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('eqField');
    newNode.classList.add('mt-2');
    newNode.setAttribute('rows',2);
    newNode.setAttribute('placeholder','Enter here');

    let aqObj = document.getElementById('aq');
    let aqAddButtonObj = document.getElementById('aqAddButton');

    aqObj.insertBefore(newNode, aqAddButtonObj);
}

// area of interest

function addNewInField(){
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('inField');
    newNode.classList.add('mt-2');
    newNode.setAttribute('rows',2);
    newNode.setAttribute('placeholder','Enter here');

    let inObj = document.getElementById('in');
    let inAddButtonObj = document.getElementById('inAddButton');

    inObj.insertBefore(newNode, inAddButtonObj);
}
// skills

function addNewSkField(){
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('skField');
    newNode.classList.add('mt-2');
    newNode.setAttribute('rows',2);
    newNode.setAttribute('placeholder','Enter here');

    let skObj = document.getElementById('sk');
    let skAddButtonObj = document.getElementById('skAddButton');

    skObj.insertBefore(newNode, skAddButtonObj);
}

// hobbies

function addNewHbField(){
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('hbField');
    newNode.classList.add('mt-2');
    newNode.setAttribute('rows',2);
    newNode.setAttribute('placeholder','Enter here');

    let hbObj = document.getElementById('hb');
    let hbAddButtonObj = document.getElementById('hbAddButton');

    hbObj.insertBefore(newNode, hbAddButtonObj);
}

function generateCV(){
    // left block

    let nameField = document.getElementById("nameField").value;
    let descField = document.getElementById("descField").value;
    let nameT1 = document.getElementById("nameT1");
    let descT = document.getElementById("descT");

    nameT1.innerHTML = nameField;
    descT.innerHTML = descField;


    document.getElementById("nameT2").innerHTML = nameField;
    document.getElementById("objectiveT").innerHTML = document.getElementById("objectiveField").value;
    document.getElementById("contactT").innerHTML = document.getElementById("numberField").value;
    document.getElementById("emailT").innerHTML = document.getElementById("emailField").value;
    document.getElementById("addressT").innerHTML = document.getElementById("addressField").value;

    // right block
    
    let wes = document.getElementsByClassName('weField');
    let str = "";
    for(let e of wes){
        str = str + `<li> ${e.value} </li>`;
    }
    document.getElementById('weT').innerHTML = str;

    let aqs = document.getElementsByClassName('eqField');
    let ch = "";
    for(let e of aqs){
        ch = ch + `<li> ${e.value} </li>`;
    }
    document.getElementById('aqT').innerHTML = ch;

    // area of interest

    let ins = document.getElementsByClassName('inField');
    let c = "";
    for(let e of ins){
        c = c + `<li> ${e.value} </li>`;
    }
    document.getElementById('inT').innerHTML = c;

    // code for profile picture

    let file = document.getElementById('imgField').files[0];
    console.log(file);

    let reader = new FileReader();
    reader.readAsDataURL(file);
    console.log(reader.result);

    // set image to the template

    reader.onloadend = function(){
        document.getElementById("imgTemplate").src = reader.result;
    }

    document.getElementById('cv-form').style.display='none';
    document.getElementById('cv-template').style.display='block';
}

// printing CV

function printCV(){
    window.print();
}

