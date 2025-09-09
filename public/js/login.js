let urlWithoutQuery = new URL(window.location.href)
let domain = urlWithoutQuery.origin
let pass2 = document.getElementById('pass');
function validatePassword() {
    let imgCheckPass = document.getElementsByClassName('img-check-pass');
    let textCheckPass = document.getElementsByClassName('text-check-pass');

    if (pass2.value.length<6 || pass2.value.length>20) {
        pass2.style.backgroundColor = 'rgba(255, 82, 82, 0.24)'
        pass2.style.color = 'white'
        pass2.style.border = '1px solid var(--Error, #FF5252)'
        textCheckPass[0].style.color = 'var(--Error, #FF5252)';
        imgCheckPass[0].src = domain+'/images/design/tich-v/do.svg'
    }else {
        pass2.style.backgroundColor = 'var(--dark-36, rgba(0, 0, 0, 0.36))'
        pass2.style.color = 'white'
        pass2.style.border = '1px solid var(--Stroke, #232323)';
        textCheckPass[0].style.color = 'var(--Light-primary, #009571)';
        imgCheckPass[0].src = domain+'/images/design/tich-v/xanh.svg'
    }

    var hasUpperCase = /[A-Z]/.test(pass2.value);
    var hasLowerCase = /[a-z]/.test(pass2.value);
    var hasNumber = /[0-9]/.test(pass2.value);
    var hasSpecialChar = /[^A-Za-z0-9]/ .test(pass2.value);

    if (hasUpperCase && hasLowerCase && hasNumber) {
        pass2.style.backgroundColor = 'var(--dark-36, rgba(0, 0, 0, 0.36))'
        pass2.style.color = 'white'
        pass2.style.border = '1px solid var(--Stroke, #232323)';
        textCheckPass[1].style.color = 'var(--Light-primary, #009571)';
        imgCheckPass[1].src = domain+'/images/design/tich-v/xanh.svg'
    }else {
        pass2.style.backgroundColor = 'rgba(255, 82, 82, 0.24)'
        pass2.style.color = 'white'
        pass2.style.border = '1px solid var(--Error, #FF5252)'
        textCheckPass[1].style.color = 'var(--Error, #FF5252)';
        imgCheckPass[1].src = domain+'/images/design/tich-v/do.svg'
    }

    if(hasSpecialChar){
        pass2.style.backgroundColor = 'rgba(255, 82, 82, 0.24)'
        pass2.style.color = 'white'
        pass2.style.border = '1px solid var(--Error, #FF5252)'
        textCheckPass[2].style.color = 'var(--Error, #FF5252)';
        imgCheckPass[2].src = domain+'/images/design/tich-v/do.svg'
    }else {
        pass2.style.backgroundColor = 'var(--dark-36, rgba(0, 0, 0, 0.36))'
        pass2.style.color = 'white'
        pass2.style.border = '1px solid var(--Stroke, #232323)';
        textCheckPass[2].style.color = 'var(--Light-primary, #009571)';
        imgCheckPass[2].src = domain+'/images/design/tich-v/xanh.svg'
    }

}

const eyeBlock =  document.getElementsByClassName('icon-password')[0];
const passInput = document.getElementsByName('password')[0];
const formLogin = document.getElementById('formLogin');
const thongbao = document.getElementsByClassName('error2')
let facebookIcon = document.getElementById('facebookIcon')
let googleIcon = document.getElementById('googleIcon')

eyeBlock.addEventListener('click', ()=>{
    if (eyeBlock.src == `${domain}/images/design/eye.svg`){
        eyeBlock.src = `${domain}/images/design/Eyeblock.svg`
        passInput.setAttribute('type', 'password')
    }else {
        eyeBlock.src = `${domain}/images/design/eye.svg`
        passInput.setAttribute('type', 'text')
    }
})

facebookIcon.addEventListener('mouseover', function () {
    facebookIcon.src = domain + '/images/design/facebookHover.svg'
})

facebookIcon.addEventListener('mouseout', function () {
    facebookIcon.src = domain + '/images/design/facebook.svg'
})

googleIcon.addEventListener('mouseover', () => {
    googleIcon.src = domain + '/images/design/googleHover.svg'
})
googleIcon.addEventListener('mouseout', () => {
    googleIcon.src = domain + '/images/design/google.svg'
})

function validateLogin()  {
    let check = true ;
    let email = document.getElementById('email')
    let password = document.getElementById('password')

    if (email.value.trim()==''){
        thongbao[0].innerHTML = 'Email không được bỏ trống'
        email.style.border = '1px solid var(--Error, #FF5252)'
        email.style.background = 'rgba(255, 82, 82, 0.24)'
        check=false
    }else {
        thongbao[0].innerHTML = ''
    }

    if (password.value.trim()==''){
        thongbao[1].innerHTML = 'Mật khâu không được bỏ trống'
        password.style.border = '1px solid var(--Error, #FF5252)'
        password.style.background = 'rgba(255, 82, 82, 0.24)'
        check=false
    }else {
        thongbao[1].innerHTML = ''
    }
}

document.getElementsByClassName('btn-register')[0].addEventListener('click', ()=> {
    let icon = document.getElementsByClassName('icon')[0];
    let textLogin = document.getElementsByClassName('text-login')[0];
    let password = document.getElementsByClassName('input-mobile')[1]
    let email = document.getElementsByClassName('input-mobile')[0]
    let login = document.getElementById('login');
    let rememeberLogin = document.getElementById('rememberLogin')
    formLogin.action = '/verify-email'

    rememeberLogin.classList.remove('d-flex')
    rememeberLogin.classList.add('d-none')
    login.innerHTML = 'Gửi thử xác minh'
    email.style.marginBottom = '16px'
    password.style.display = 'none'
    let imgs  =  icon.querySelectorAll('img');

    password.style.display='none'
    textLogin.innerHTML = 'Đăng ký bằng email để nhận được email xác minh';

    imgs.forEach(img =>{
        img.style.display = 'none'
    })
    document.getElementsByClassName('btn-register')[0].style.background = 'rgba(255, 255, 255, 0.06)';
    document.getElementsByClassName('btn-login')[0].style.background = 'var(--dark-36, rgba(0, 0, 0, 0))';
})

document.getElementsByClassName('btn-login')[0].addEventListener('click', ()=> {
    let icon = document.getElementsByClassName('icon')[0];
    let textLogin = document.getElementsByClassName('text-login')[0];
    let password = document.getElementsByClassName('input-mobile')[1]
    let email = document.getElementsByClassName('input-mobile')[0]
    let login = document.getElementById('login');
    let rememeberLogin = document.getElementById('rememberLogin')

    rememeberLogin.classList.add('d-flex')
    rememeberLogin.classList.remove('d-none')
    login.innerHTML = 'Đăng nhập'
    email.style.marginBottom = '0px'
    password.style.display = 'block'
    textLogin.innerHTML = 'Đăng nhập với tài khoản mạng xã hội';
    formLogin.action = '/login-client'


    let imgs  =  icon.querySelectorAll('img');
    imgs.forEach(img =>{
        img.style.display = 'block'
    })
    document.getElementsByClassName('btn-login')[0].style.background = 'rgba(255, 255, 255, 0.06)';
    document.getElementsByClassName('btn-register')[0].style.background = 'var(--dark-36, rgba(0, 0, 0, 0))';
})

