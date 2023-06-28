document.addEventListener('DOMContentLoaded',async(e)=>{
    const elemento= document.querySelector('.contenedor');
    const options = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    };
    console.log("hola");
    res= await fetch('http://localhost/clasevirtual/uploads/persona/123' ,options);
    resultado= await res.json();

    console.log(resultado);

})