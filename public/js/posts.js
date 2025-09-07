let menu = document.getElementById('menuMobile');
const body = document.querySelector('#body')
const posts = document.getElementsByClassName('none')

if (document.getElementById('body')) {
    body.style.height = 'auto'
}
document.getElementById('outMenu').addEventListener('click', () => {
    menu.style.display = 'none'
    document.getElementById('overlay').style.display = 'none';
})
document.getElementById('showmenu').addEventListener('click', () => {
    menu.style.display = 'block'
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('overlay').style.zIndex = '1';
})
document.getElementById('overlay').addEventListener('click', ()=> {
    menu.style.display = 'none'
    document.getElementById('overlay').style.display = 'none';
});


