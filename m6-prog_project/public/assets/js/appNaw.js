

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

    fetch("nawOpslaan.php", options)
        .then(async (response) => {
            console.log(response);
            let json = await response.json();
            console.log(json);
        });
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


