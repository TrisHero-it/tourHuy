const error = document.getElementsByClassName('error')
const category = document.getElementsByName('category_id')[0]
const name = document.getElementById('name')
const moneys = document.getElementById('moneys')
const emailBuyer = document.getElementById('email_buyer')
const nameBuyer = document.getElementById('name_buyer')
const emailSeller = document.getElementById('email_seller')
const nameSeller = document.getElementById('name_seller')
const content = document.getElementById('text')
const midMan = document.getElementsByName('midman')[0];
const recapcha = document.getElementsByName('g-recaptcha-response');
function validate() {
    let check = true
    if (category.value.trim() == '') {
        error[0].style.display = 'block'
        error[0].innerHTML = 'Danh mục không được để trống'
        document.getElementById('form2').style.border = '1px solid var(--Error, #FF5252)'
        check = false
    } else {
        error[0].style.display = 'none'
    }

    if (name.value.trim() == '') {
        error[1].style.display = 'block'
        name.style.border = '1px solid var(--Error, #FF5252)'
        error[1].innerHTML = 'Tên hợp đồng không được để trống'
        check = false
    } else {
        error[1].style.display = 'none'
    }

    if (moneys.value.trim() == '') {
        error[2].style.display = 'block'
        error[2].innerHTML = 'Số tiền giao dịch không được để trống'
        moneys.style.border = "1px solid var(--Error, #FF5252)"
        check = false
    } else if (moneys.value < 50000) {
        error[2].style.display = 'block'
        error[2].innerHTML = 'Số tiền giao dịch phải lớn hơn 50000'
        check = false
    }
    else {
        error[2].style.display = 'none'
    }

    let regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (emailBuyer.value.trim() == '') {
        error[6].style.display = 'block'
        error[6].innerHTML = 'Email người mua không được để trống'
        emailBuyer.style.border = "1px solid var(--Error, #FF5252)"
        check = false
    } else if (!regexEmail.test(emailBuyer.value)) {
        error[6].style.display = 'block'
        error[6].innerHTML = 'Email phải điền đúng định dạng'
        emailBuyer.style.border = "1px solid var(--Error, #FF5252)"

        check = false
    } else {
        error[6].style.display = 'none'
    }

    if (nameBuyer.value.trim() == '') {
        error[7].style.display = 'block'
        error[7].innerHTML = 'Tên người mua không được để trống'
        nameBuyer.style.border = "1px solid var(--Error, #FF5252)"
        check = false
    } else {
        error[7].style.display = 'none'
    }

    if (emailSeller.value.trim() == '') {
        error[4].style.display = 'block'
        error[4].innerHTML = 'Email người bán không được để trống'
        emailSeller.style.border = "1px solid var(--Error, #FF5252)"
        check = false
    } else if (!regexEmail.test(emailSeller.value)) {
        error[4].style.display = 'block'
        error[4].innerHTML = 'Email phải điền đúng định dạng'
        emailSeller.style.border = "1px solid var(--Error, #FF5252)"
        check = false
    } else {
        error[4].style.display = 'none'
    }

    if (nameSeller.value.trim() == '') {
        error[5].style.display = 'block'
        error[5].innerHTML = 'Tên không được để trống'
        nameSeller.style.border = "1px solid var(--Error, #FF5252)"
        check = false
    } else {
        error[5].style.display = 'none'
    }

    if (midMan.value.trim() == '') {
        error[6].style.display = 'block';
        error[6].innerHTML = 'Vui lòng chọn midman';
        midMan.style.border = "1px solid var(--Error, #FF5252)"
        check = false
    }else {
        error[6].style.display = 'none';
    }

    return check
}
