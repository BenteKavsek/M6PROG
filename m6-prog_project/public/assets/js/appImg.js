let ImageForm = document.getElementById("imageForm")

function FormToDictonary(form)
{
    const data = new FormData(form);
    let formKeyValue ={};
    for (const [name, value]of data)
    {
        formKeyValue[name] = value;
    }
    return formKeyValue
}

ImageForm.addEventListener("submit", (e) => {
    e.preventDefault();
    uploadFormFile(e);
});

function uploadFormFile(){
    let form = e.target;
    let options = 
    {
        method: "POST",
        body: new FormData(form)
    }


    fetch("imageRecieve.php", options)
    .then(response => response.json())
    .then(data => {
        if (false === data.success) {
            alert('niet goed');
            errorMelding.textContent = data.error;
            return false;
        } 
        console.log( 'Je data is toegevoegd met id:' + data.id );
    })
    .catch(error => console.error(error));
}

