

const seachBar = document.querySelector('.users .search input'),
searchBtn = document.querySelector('.users .search button');

searchBtn.onclick = ()=>{
    seachBar.classList.toggle('active');
    seachBar.focus();
    searchBtn.classList.toggle('active');
    seachBar.value = '';
}

function openChat(user){
        // Create an iframe element
        var iframe = document.createElement('iframe');
        iframe.src = 'chat.php?username=' + user + "&status=Active";
        iframe.style.width = '600px';
        iframe.style.height = '100%';
        iframe.style.border = 'none';
        iframe.style.marginLeft = '20px'; // Define uma margem esquerda de 20 pixels


        // Remove any existing chat content
        var chatContent = document.getElementById('chatContent');
        chatContent.innerHTML = '';

        // Append the iframe to the chatContent div
        chatContent.appendChild(iframe);
}
