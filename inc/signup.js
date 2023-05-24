
const form = document.querySelector('.signup form'),
continueBtn = form.querySelector('.button input');

form.onsubmit = (e) => {
    e.preventDefault(); //previne de um auto submit   
}

continueBtn.onclick = ()=>{
    //let's start ajax
    let xhr = new XMLHttpRequest(); //cria um objeto XML
    xhr.open("POST", "inc/signup.php", true); //cria um objeto XML
    xhr.onload = () => {

    }

    xhr.send();
}
