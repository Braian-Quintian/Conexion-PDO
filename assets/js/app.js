addEventListener("DOMContentLoaded", ()=>{
    let myfor = document.querySelector("#FormPais");
    myfor.addEventListener("submit", async(e)=>{
        e.preventDefault();
        let opc = e.submitter.dataset.accion;
        if(opc=="guardar"){
            let config = {
                method:"POST",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        nombrePais : document.querySelector("#nombrePais").value
                    }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-065/RETO/uploads/pais", config)).text();
            console.log(data);
        }else if(opc=="listar"){
            let config = {
                method:"GET",
                headers:{"Content-Type": "Application/json"},
            };
            let data = await (await fetch("http://localhost/ApolT01-065/RETO/uploads/pais", config)).json();
            console.log(data);
        }else if(opc=="actualizar"){
            let config = {
                method:"PUT",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        idPais : document.querySelector("#idPais").value,
                        nombrePais : document.querySelector("#nombrePais").value
                    }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-065/RETO/uploads/pais", config)).text();
            console.log(data);
        }else if(opc=="eliminar"){
            let config = {
                method:"DELETE",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        idPais : document.querySelector("#idPais").value
                    }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-065/RETO/uploads/pais", config)).text();
            console.log(data);
        }
        // window.location.reload();
    })
})

addEventListener("DOMContentLoaded", ()=>{
    let myfor = document.querySelector("#FormDep");
    myfor.addEventListener("submit", async(e)=>{
        e.preventDefault();
        let opc = e.submitter.dataset.accion;
        if(opc=="guardar"){
            let config = {
                method:"POST",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        nombrePais : document.querySelector("#nombreDep").value
                    }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-065/RETO/uploads/departamento", config)).text();
            console.log(data);
        }else if(opc=="listar"){
            let config = {
                method:"GET",
                headers:{"Content-Type": "Application/json"},
            };
            let data = await (await fetch("http://localhost/ApolT01-065/RETO/uploads/departamento", config)).json();
            console.log(data);
        }else if(opc=="actualizar"){
            let config = {
                method:"PUT",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        idPais : document.querySelector("#idDep").value,
                        nombrePais : document.querySelector("#nombreDep").value
                    }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-065/RETO/uploads/departamento", config)).text();
            console.log(data);
        }else if(opc=="eliminar"){
            let config = {
                method:"DELETE",
                headers:{"Content-Type": "Application/json"},
                body:JSON.stringify(
                    {
                        idPais : document.querySelector("#idDep").value
                    }
                )
            };
            let data = await (await fetch("http://localhost/ApolT01-065/RETO/uploads/departamento", config)).text();
            console.log(data);
        }
        // window.location.reload();
    })
})

var body = document.getElementById("tbody");
function listar(){
    let config = {
        method:"GET",
        headers:{"Content-Type": "Application/json"},
    };
    fetch("http://localhost/ApolT01-065/RETO/uploads/pais", config)
    .then(res => res.json())
    .then(data => {
        data.forEach(element => {
            body.innerHTML += `
            <tr>
                <td>${element.idPais}</td>
                <td>${element.nombrePais}</td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editar(${element.idPais})">Editar</button>
                    <button class="btn btn-danger" onclick="eliminar(${element.idPais})">Eliminar</button>
                </td>
            </tr>
            `;
        });
    })
}