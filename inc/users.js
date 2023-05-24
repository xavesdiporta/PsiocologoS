

const seachBar = document.querySelector('.users .search input'),
searchBtn = document.querySelector('.users .search button');

searchBtn.onclick = ()=>{
    seachBar.classList.toggle('active');
    seachBar.focus();
    searchBtn.classList.toggle('active');
    seachBar.value = '';
}
