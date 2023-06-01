document.getElementById('anonymous').onclick = function (){
    window.location.href = 'login.php';
    // Change the "required" attribute of the input field
    var inputUsername = document.getElementsByName('username')[0];
    inputUsername.removeAttribute('required');
}