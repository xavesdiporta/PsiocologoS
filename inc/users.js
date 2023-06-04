

const seachBar = document.querySelector('.users .search input'),
searchBtn = document.querySelector('.users .search button');

searchBtn.onclick = ()=>{
    seachBar.classList.toggle('active');
    seachBar.focus();
    searchBtn.classList.toggle('active');
    seachBar.value = '';
}

function openChat(user,status){
        // Create an iframe element
        var iframe = document.createElement('iframe');
        iframe.src = 'chat.php?username=' + encodeURIComponent(user) + "&status=" + encodeURIComponent(status);
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = 'none';
        iframe.style.marginLeft = '20px'; // Define uma margem esquerda de 20 pixels

        
        // Remove any existing chat content
        let chatContent = document.getElementById('chatContent');
        chatContent.innerHTML = '';
        
        // Append the iframe to the chatContent div
        chatContent.appendChild(iframe);
}


function openChatGeral(user,status) {
    // Create an iframe element
    var iframe = document.createElement('iframe');
    iframe.src = 'chat_geral.php';
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = 'none';
    iframe.style.marginLeft = '20px'; // Define uma margem esquerda de 20 pixels

    // Remove any existing chat content
    let chatContent = document.getElementById('chatContent');
    chatContent.innerHTML = '';

    // Append the iframe to the chatContent div
    chatContent.appendChild(iframe);
}
