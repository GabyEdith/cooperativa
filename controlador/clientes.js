    getData();
    
    document.getElementById("campo").addEventListener("keyup", getData);
    function getData(){
    let input = document.getElementById("campo").value;
    let content = document.getElementById("content");
    let url = "../modelo/clientes.php";

    let formData = new FormData();
    formData.append('campo', input);
    
    fetch(url, {
        method: "POST",
        body: formData,
     })
    .then(response => response.json())
    .then(data => {
     content.innerHTML = data;
    }).catch(err => console.log(err)); 
    }


