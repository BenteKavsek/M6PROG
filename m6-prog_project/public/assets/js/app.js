let searchFormulier = document.getElementById('searchForm');

function searchPersoon(e){
    e.preventDefault();
    let form = e.target;
    const data = new FormData(form);
    let url = "searchNaw.php?search="+data.get("searchPersoon")
    fetch(url)
    .then(async (response)=>
    {
        console.log(response);
        let json = await response.json();
        console.log(json);
        showPersoon(json);
    });
    console.log(url);
}
searchFormulier.addEventListener("submit", (e) => {
    searchPersoon(e)
});

function showPersoon(json){

    let person = json[0];
    
    let naam = document.getElementById("naam");
    document.getElementById("naam").textContent = person.naam;
    
    let id = document.getElementById("id");
    document.getElementById("id").textContent = person.id;
    
    let straat = document.getElementById("straat");
    document.getElementById("straat").textContent = person.straat;
    
    let postcode = document.getElementById("postcode");
    document.getElementById("postcode").textContent = person.postcode;
    
    let email = document.getElementById("email");
    document.getElementById("email").textContent = person.email;
}



