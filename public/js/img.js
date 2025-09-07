
const mar = document.getElementById('mar');
const fileInput = document.getElementById('file');

if (document.getElementById('home')) {
    let home = document.getElementById('home')
    home.addEventListener('click', () => {
        window.location.href = '/';
    })
}

function checkImages() {
    let img = document.getElementById('file');
    console.log(img.files);
    let arrImg = [...img.files]
    let checkImage = [];
    let imgGrant = ['png', 'jpeg', 'jpg', 'gif', 'svg']
    for (let index = 0; index < arrImg.length; index++) {
        let check = false
        checkImage = arrImg[index].name.split('.');
        for (let i = 0; i < imgGrant.length; i++) {
            if (checkImage[checkImage.length - 1] == imgGrant[i]) {
                check = true;
                break
            }
        }
        if (check == false) {
            document.getElementById('error').style.display = 'block'
            return check
        }
    }
    return true
}


function showImages(event) {
    let seriImages = 0;
    const data = new DataTransfer()

    return (event) => {
        const images = [...event.target.files]

        images.forEach((image, index) => {
            const files = image
            data.items.add(files)
        })

        document.getElementById('file').files = data.files
        const img = document.getElementById('img');
        img.style.display = 'flex'
        for (let i = 0; i < images.length; i++) {
            const reader = new FileReader();
            reader.onload = function (e) {
                let html = `
                <div class="image-container">
                    <img src="your-image.jpg" id="imageDisplay${seriImages}" alt="Image" class="image2">
                    <div class="overlayImages"></div>
                    <div class="option">
                    <img src="http://localhost:8000/images/Eye.svg" onclick="largeImg

                    (${seriImages})" id="viewImage" alt="Image">
                    <img src="http://localhost:8000/images/DeleteOutlined.svg" id="delImage${seriImages}" data-id={${seriImages}} onclick="deleteImage(${seriImages})" alt="Image">
                    </div>
                </div>
                       `
                $(img).prepend(html)

                const imageDisplay = document.getElementById('imageDisplay' + seriImages++);
                imageDisplay.src = e.target.result;
                imageDisplay.style.display = 'block'
            }
            reader.readAsDataURL(images[i]);
        }
    }
}


const debounceImages = showImages()

const largeImg = (id) => {
    let img = document.getElementById('imageDisplay' + id)
    let overlay = document.getElementById('over')
    overlay.style.display = 'block'
    overlay.style.zIndex = '1'
    img.style.zIndex = '100'
    if (screen.width <=500) {
        img.style.width = '300px'
    }else {
        img.style.width = '500px'
    }

    img.style.height = 'auto'
    img.style.position = 'fixed'
    img.style.top = '50%'
    img.style.left = '50%'
    img.style.transform = 'translate(-50%, -50%)'

    document.getElementById('over').addEventListener('click', () => {
        document.getElementById('over').style.display = 'none'
        img.style.zIndex = 'unset'
        img.style.width = '85px'
        img.style.height = '85px'
        img.style.position = 'unset'
        img.style.transform = 'translate(0)'
    })
}

const largeImg2 = (id) => {
    let img = document.getElementById('oldImage' + id)
    let overlay = document.getElementById('over')
    overlay.style.display = 'block'
    img.style.zIndex = '100'
    if (screen.width <=500) {
        img.style.width = '300px'
    }else {
        img.style.width = '500px'
    }
    img.style.height = 'auto'
    img.style.position = 'fixed'
    img.style.top = '50%'
    img.style.left = '50%'
    img.style.transform = 'translate(-50%, -50%)'

    document.getElementById('over').addEventListener('click', () => {
        document.getElementById('over').style.display = 'none'
        img.style.zIndex = 'unset'
        img.style.width = '85px'
        img.style.height = '85px'
        img.style.position = 'unset'
        img.style.transform = 'translate(0)'
    })
}


const deleteImage = (id) => {
    const data = new DataTransfer()
    const inp = document.getElementById('file');

    for (var i = 0; i < inp.files.length; ++i) {
        if (i == id) {
            continue
        }
        var name = inp.files.item(i).name;
        const files = inp.files[i]
        data.items.add(files)
    }
    document.getElementById('file').files = data.files
    let img = document.getElementById('imageDisplay' + id)
    img.parentElement.style.display = 'none'
    mar.style.display = 'block'

}

const getUID = () => {
    imageUID = document.getElementById('getUID');
    imageUID.style.zIndex = '1000'
    imageUID.style.display = 'block'
    imageUID.style.position = 'fixed';
    imageUID.style.top = '50%';
    imageUID.style.left = '50%';
    imageUID.style.transform = 'translate(-50%, -50%)';
    let overlay = document.getElementById('over')
    overlay.style.display = 'block'

    document.getElementById('over').addEventListener('click', () => {
        document.getElementById('over').style.display = 'none'
        imageUID.style.display = 'none'
        imageUID.style.zIndex = 'unset'
        imageUID.style.position = 'unset'
        imageUID.style.transform = 'translate(0)'
    })
}

function copyToClipboard(elementId) {
    var copyText = document.getElementById(elementId);
    var textArea = document.createElement("textarea");
    textArea.value = copyText.innerText;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    textArea.remove();
    alert("Copied: " + textArea.value);
}
// khai báo ra 1 cái biến đại diện cho imagesDisplay (1,2,3,4,5)

// để hàm có thể hưởng được biến đó (closure)
