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
    });
    console.log(url);
}
searchFormulier.addEventListener("submit", (e) => {
    searchPersoon(e)
});