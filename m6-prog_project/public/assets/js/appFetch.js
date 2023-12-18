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

let postForm = document.getElementById("postForm");

postForm.addEventListener("submit", (e) =>
{
    e.preventDefault();
    toPhpWithPost(e);
});

function toPhpWithPost(e){
    let form = e.target;
    let jsonForm = FormToDictonary(form);
    console.log(jsonForm);

    let options = 
    {
        method: "POST",
        cache: "no-cache",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(jsonForm)
    };
    fetch("fetchPost.php", options) 
    .then(async(response)=>
    {
        console.log(response);
    });

    console.log(options);
}


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




// http://localhost:8088/search.html