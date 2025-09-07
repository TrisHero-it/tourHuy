
const ChangeToTrader = (arrId) => {
    for (let index = 0; index < arrId.length; index++) {
        let a = document.getElementById(arrId[index]);
        let input = document.createElement('input')
        input.type = "text";
        if (index == 0) {
            input.value = a.href == undefined ? a.innerText : a.href;
        } else {
            input.value = a.innerText
        }
        console.log(a.innerText);
        input.classList.add('form-control');
        input.style.marginTop = '8px'
        input.style.marginBottom = '15px'
        input.name = a.id
        a.parentNode.replaceChild(input, a);
    }
    document.getElementById('submit1').style.display = 'block'
    document.getElementById('submit2').style.display = 'none'
    document.getElementById('submit3').style.display = 'none'
}

const changToArea = (arrId) => {
    for (let index = 0; index < arrId.length; index++) {
        let a = document.getElementById(arrId[index]);
        let input = document.createElement("textarea")
        input.style.height = '167px'
        if (index == 0) {
            input.value = a.href == undefined ? a.innerText : a.href;
        } else {
            input.value = a.innerText
        }
        input.id = a.id
        input.classList.add('form-control');
        input.style.marginTop = '8px'
        input.style.marginBottom = '15px'
        input.name = a.id
        a.parentNode.replaceChild(input, a);
    }
    if (arrId.length == 1) {
        document.getElementById('submit1').style.display = 'none'
        document.getElementById('submit3').style.display = 'none'
        document.getElementById('submit2').style.display = 'block'
    } else {
        document.getElementById('submit2').style.display = 'none'
        document.getElementById('submit1').style.display = 'none'
        document.getElementById('submit3').style.display = 'block'
    }
}
