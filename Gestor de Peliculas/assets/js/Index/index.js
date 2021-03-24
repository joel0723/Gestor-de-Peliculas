
function limpiar(){

    let imputNombre = document.getElementById("nombre");
    imputNombre.value = "";
    imputNombre.focus();

    let imputTelefono = document.getElementById("telefono");
    imputTelefono.value ="";

    let selectTipoContacto = document.getElementById("tipo-contacto");
    selectTipoContacto.value = "";

}

function CreateContactElement(){

    let mainContainer = document.getElementById("contact-container");

    let imputNombre = document.getElementById("nombre");
    let valueNombre = imputNombre.value;

    let imputTelefono = document.getElementById("telefono");
    let valueTelefono = imputTelefono.value;

    let selectTipoContacto = document.getElementById("tipo-contacto");
    let valueTipoContacto = selectTipoContacto.value;



    let IsValid = validar(imputNombre, imputTelefono, selectTipoContacto);

    if(IsValid){

    let DivColMd4 = document.createElement("div");
    DivColMd4.setAttribute("class","col-md-4 margen-top-3");

    let DivCard = document.createElement("div");
    DivCard.setAttribute("class","card");

    let DivCardBody1 = document.createElement("div");
    DivCardBody1.setAttribute("class","card-body bg-success text-white");

    let H5CardTitle = document.createElement("h5");
    H5CardTitle.setAttribute("class","card-title");
    H5CardTitle.innerHTML = "Contacto - " + valueTipoContacto;

    let UlListGroup = document.createElement("ul");
    UlListGroup.setAttribute("class","list-group list-group-flush");

    let LiNombre = document.createElement("li");
    LiNombre.setAttribute("class","list-group-item");
    LiNombre.innerHTML = "Nombre -" + valueNombre;

    let LiTelefono = document.createElement("li");
    LiTelefono.setAttribute("class","list-group-item");
    LiTelefono.innerHTML = "Telefono -" + valueTelefono;

    let DivCardBody2 = document.createElement("div");
    DivCardBody2.setAttribute("class","card-body");

    let ButtomEliminar = document.createElement("buttom");
    ButtomEliminar.setAttribute("class","btn btn-danger");
    ButtomEliminar.innerHTML = "Borrar";
    ButtomEliminar.addEventListener("click", function(){

        mainContainer.removeChild(DivColMd4);
    })

    DivCardBody2.appendChild(ButtomEliminar);

    UlListGroup.appendChild(LiNombre);
    UlListGroup.appendChild(LiTelefono);

    DivCardBody1.appendChild(H5CardTitle);

    DivCard.appendChild(DivCardBody1);
    DivCard.appendChild(UlListGroup);
    DivCard.appendChild(DivCardBody2);

    DivColMd4.appendChild(DivCard);

    mainContainer.appendChild(DivColMd4);

   

    
        alert("Contacto Registrado");
        limpiar();
    }else{
        alert("Debe completar los campos");
    }
}



function validar(imputNombre, imputTelefono, selectTipoContacto){

    let IsValid = true;

    
    let valueNombre = imputNombre.value;


    if(valueNombre == "" || valueNombre == null || valueNombre == undefined){

        IsValid = false
        imputNombre.classList.add("imput-error");
    }else{
        imputNombre.classList.remove("imput-error");
    }

    // Validar Telefono

    
    let valueTelefono = imputTelefono.value;


    if(valueTelefono == "" || valueTelefono == null || valueTelefono == undefined){

        IsValid = false
        imputTelefono.classList.add("imput-error");
    }else{
        imputTelefono.classList.remove("imput-error");
    }

    
    let valueTipoContacto = selectTipoContacto.value;
    
    if(valueTipoContacto == "" || valueTipoContacto == null || valueTipoContacto == undefined){

        IsValid = false
        selectTipoContacto.classList.add("imput-error");
    }else{
        selectTipoContacto.classList.remove("imput-error");
    }

    
    return IsValid;

}

