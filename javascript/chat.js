
const form = document.querySelector(".typing-area"),  //TODO form class
incoming_id = form.querySelector(".incoming_id").value,  //TODO incoming_id class
inputField = form.querySelector(".input-field"),  //TODO input-field class
sendBtn = form.querySelector("button"),  //TODO button class
chatBox = document.querySelector(".chat-box");  //TODO chat-box class

form.onsubmit = (e)=>{  //TODO form class
    e.preventDefault();  //TODO preventDefault(), prevents the default form submission behavior, ensuring that the page doesn't reload.
}

inputField.focus();   //TODO focus() method is used to give focus to an element (if it can be focused)
inputField.onkeyup = ()=>{  //TODO onkeyup event occurs when the user releases a key (on the keyboard)
    if(inputField.value != ""){  //TODO value property sets or returns the value of the value attribute of a text field
        sendBtn.classList.add("active");  //TODO classList property returns the class name(s) of an element, as a DOMTokenList object
    }else{
        sendBtn.classList.remove("active");  //TODO remove() method removes the specified class(es) from the selected elements
    }
}

sendBtn.onclick = ()=>{  //TODO onclick event occurs when the user clicks on an element
    let xhr = new XMLHttpRequest();  //TODO XMLHttpRequest object is used to exchange data with a server behind the scenes
    xhr.open("POST", "php/insert-chat.php", true);  //TODO open(method, url, async) method specifies the type of request
    xhr.onload = ()=>{  //TODO onload and onerror are event handlers that are called when the state of the XMLHttpRequest changes
      if(xhr.readyState === XMLHttpRequest.DONE)  //TODO readyState property holds the status of the XMLHttpRequest
      {
          if(xhr.status === 200)  //TODO status property holds the status number of a request
          {
              inputField.value = "";  //TODO value property sets or returns the value of the value attribute of a text field
              scrollToBottom();  //TODO scrollToBottom() function is used to scroll to the bottom of the chat box
          }
      }
    }
    let formData = new FormData(form);  //TODO FormData object lets you compile a set of key/value pairs to send using XMLHttpRequest
    xhr.send(formData);  //TODO send() method sends the request to the server (used for GET)
}  
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE)
      {
          if(xhr.status === 200)
          {
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active"))
            {
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  