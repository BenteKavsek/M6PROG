let errorMelding = document.getElementById("error");

function addperson(e) {
    e.preventDefault();
    let form = e.target;
    let jsonForm = FormtoDictionairy(form);
    
    
    console.log(jsonForm);
    let options =
    {
        method: "POST",
        cache: "no-cache",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(jsonForm)
    }

    fetch("nawopslaan.php", options)
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

let nawForm = document.getElementById("nawForm");

nawForm.addEventListener("submit", (e) => {
    addperson(e)
});


function FormtoDictionairy(form) {
    const data = new FormData(form);
    let formKeyValue = {};
    for (const [name, value] of data) {
        formKeyValue[name] = value;
    }
    return formKeyValue;
}


