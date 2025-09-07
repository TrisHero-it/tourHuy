
const form  = document.getElementsByClassName('no-scroll')[0];
const comment = document.getElementById('comment');
const errorComment = document.getElementById('errorComment')
const btnComment = document.getElementById('commentSubmit')
let postId = window.location.href.split('/');
 postId = postId[postId.length-1]
form.addEventListener('keydown',(e)=>{
    if (e.keyCode == 13) {
        e.preventDefault();
        validate()
    }
})
btnComment.addEventListener('click', (e)=> {
   validate()
})

function submitForm(event, id=null) {
     let formSubmit = document.getElementsByClassName('form_reply'+id);
    if (event.keyCode == 13) {
        event.preventDefault();
        validate(id)
    }
}

function validate(id=null) {
    let check = true;
    let regexLink = /https?:\/\/[^\s]+/
    if (id==null) {
        if (comment.value.trim()==''){
            errorComment.innerHTML= 'Comment không được để trống!'
            return false
        }else if (regexLink.test(comment.value)) {
            errorComment.innerHTML= 'Không được comment link!'
            return false
        }else {
            errorComment.innerHTML = ''
            handleSubmit()
        }
    }else {
        let thongbao = document.getElementById('errorComment'+id);
        let contentComment = document.getElementsByClassName('content-comment'+id)[0];
        let btnReply = document.getElementById('btnReply'+id);
        if (contentComment.value.trim()==''){
            thongbao.innerHTML= 'Comment không được để trống!'
            return false
        }else if (regexLink.test(contentComment.value)) {
            thongbao.innerHTML= 'Không được comment link!'
            return false
        }else {
            thongbao.innerHTML = ''
            handleSubmit2(btnReply, contentComment, id)
        }
    }
}




