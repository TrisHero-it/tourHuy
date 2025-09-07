document.getElementById('over').style.display = 'block'
document.getElementById('success').style.display = 'block'

const success = document.getElementById('success');
const closee = document.getElementById('closeNoti')

success.style.position = 'fixed';
success.style.top = '50%';
success.style.left = '50%';
success.style.transform = 'translate(-50%, -50%)';

closee.addEventListener('click', ()=>{
success.style.display='none';
document.getElementById('over').style.display = 'none'
})

document.getElementById('over').addEventListener('click', ()=>{
    success.style.display='none';
document.getElementById('over').style.display = 'none'
})

    
