let getVideo = document.getElementsByClassName('get-video')
let video = document.getElementsByClassName('guide-get-username')[0];
let video2 =document.getElementById('video');

document.getElementById('closePopUp').addEventListener('click', ()=>{
video.style.display = 'none'
document.getElementById('over').style.display='none'
video2.pause();
})

document.getElementById('over').addEventListener('click', ()=> {
video.style.display = 'none'
document.getElementById('over').style.display='none'
video2.pause();
})

getVideo[0].addEventListener('click', ()=> {
video.style.display = 'block'
document.getElementById('over').style.display='block'
})

getVideo[1].addEventListener('click', ()=> {
    video.style.display = 'block'
document.getElementById('over').style.display='block'
})
