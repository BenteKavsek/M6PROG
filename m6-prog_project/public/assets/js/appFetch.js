let getForm = document.getElementById("getForm");

getForm.addEventListener("submit", (e) => 
{
    e.preventDefault();
    toPhpWithGet(e);
});

function toPhpWithGet(e){
    let form = e.target;
    const data = new FormData(form);

    console.log(data.get("article"));
    console.log(data.get("maxPrice"));


    let url = "fetchGet.php?article="+data.get("article")+"&maxPrice="+data.get("maxPrice");
    fetch(url)
    .then((response)=>{
        console.log(response);
    });
}