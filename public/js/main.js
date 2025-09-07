
const pre = document.getElementById('prev');
const next = document.getElementById('next');

const main = document.getElementsByClassName('categories')[0];
const arrCategory = document.getElementsByClassName('category');
const home = document.getElementById('home')
let url = window.location.search;
let urlParam = new URLSearchParams(url)
let cateId = urlParam.get('cate')
length = arrCategory.length
let click = 0;
let ao = 1;
let translateX = 0;
// active(0)

function active(index = 0, reset = null) {
    let abc = document.getElementsByClassName('category')[index];
    if (abc) {
        if (index!=ao) {
            document.getElementsByClassName('category')[index].style.border = '1px solid var(--Light-primary, #009571)'
            document.getElementsByClassName('category-text')[index].style.background = '#0A2E25'
            if (reset != null) {
                document.getElementsByClassName('category-text')[reset].style.background = '#1E1E1E';
                document.getElementsByClassName('category')[reset].style.border = '1px solid #1E1E1E'
            }
            ao=index
        }
    }
}

function validateSearch() {
    let search = document.querySelector('#search')
    if (search.value == '' || search.value == null) {
        document.querySelector('.noti-search').style.display = 'block'
        return false
    }
}

function fetcgSuggest(value) {
    let html = ''
    let url = window.location.pathname != '/traders' ? '/search' : '/api/traders-search';
    $.ajax({
        url: url,
        method: 'GET',
        data: {
            search: value
        },
        success: function (data) {
            if (data.length < 1) {
                html += `
                <div id="param0">Not found</div>
                `
                document.getElementById('search2').innerHTML = html;
            } else {
                $.each(data, function (index, hint) {
                    if (window.location.pathname != '/traders') {
                        html += `
                    <div id="param${index}" onclick="clicked('${hint.fullname}')">${hint.fullname} - ${hint.numberphone}</div>
                    `;
                    } else {
                        html += `
                    <div id="param${index}" onclick="clicked('${hint.fullname}')">${hint.fullname} - ${hint.zalo}</div>
                    `;
                    }

                })
                document.getElementById('search2').innerHTML = html;
            }
        }
    });
}

function debounce(func, timeout = 300) {
    let timer
    // event , this.value
    return (...args) => {
        clearTimeout(timer)
        timer = setTimeout(() => {
            func.apply(this, args)
        }, timeout)
    }
}

let a = -1;
function showHints(e, value) {
    document.querySelector('.noti-search').style.display = 'none'

    if (e.keyCode == 13 || e.keyCode == 38 || e.keyCode == 40) {
        return
    }
    a = -1
    let search = document.getElementById('search')
    let list = document.getElementById('search2')
    console.log(search.value)
    if (search.value != '') {
        list.style.display = 'block';
    } else {
        list.style.display = 'none';
    }
    fetcgSuggest(value)
}

const debounceShowHints = debounce(showHints, 300)

document.getElementById('search').addEventListener('keydown', (e) => {
    let arrHint = JSON.parse(localStorage.getItem('hints'));
    if (e.keyCode == 40) {
        b = arrHint.length - 1
        document.getElementById('param' + b).style.background = ""
        a++;
        if (a == arrHint.length) {
            a = 0;
        }
        document.getElementById('search').value = document.getElementById('param' + a).innerText
        document.getElementById('param' + a).style.background = "rgba(255, 255, 255, 0.12)"
        if (a >= 1) {
            document.getElementById('param' + (a - 1)).style.background = ""
        }

    } else if (e.keyCode == 38) {
        a--;
        if (a == -2) {
            a = b;
            document.getElementById('param' + b).style.background = "rgba(255, 255, 255, 0.12)"
        }
        if (a == -1) {
            a = b;
            document.getElementById('param' + 0).style.background = ""
        }
        document.getElementById('param' + a).style.background = "rgba(255, 255, 255, 0.12)"
        document.getElementById('search').value = document.getElementById('param' + a).innerText
        if (a < b) {
            document.getElementById('param' + (a + 1)).style.background = ""
        }

    } else if (e.keyCode == 13) {
        a = -1;
        fetcgSuggest();
        let list = document.getElementById('search2')
        list.style.display = 'none';
        search.focus();
    }
})

if (document.getElementById('search3')) {
    document.getElementById('search3').addEventListener('keydown', (e) => {
        let arrHint = JSON.parse(localStorage.getItem('hints'));
        if (e.keyCode == 40) {
            b = arrHint.length - 1
            document.getElementById('param' + b).style.background = ""
            a++;
            if (a == arrHint.length) {
                a = 0;
            }
            document.getElementById('search').value = document.getElementById('param' + a).innerText
            document.getElementById('param' + a).style.background = "rgba(255, 255, 255, 0.12)"
            if (a >= 1) {
                document.getElementById('param' + (a - 1)).style.background = ""
            }

        } else if (e.keyCode == 38) {
            a--;
            if (a == -2) {
                a = b;
                document.getElementById('param' + b).style.background = "rgba(255, 255, 255, 0.12)"
            }
            if (a == -1) {
                a = b;
                document.getElementById('param' + 0).style.background = ""
            }
            document.getElementById('param' + a).style.background = "rgba(255, 255, 255, 0.12)"
            document.getElementById('search').value = document.getElementById('param' + a).innerText
            if (a < b) {
                document.getElementById('param' + (a + 1)).style.background = ""
            }

        } else if (e.keyCode == 13) {
            a = -1;
            fetcgSuggest();
            let list = document.getElementById('search2')
            list.style.display = 'none';
            search.focus();
        }
    })
}


function clicked(value) {
    let search = document.getElementById('search')
    let list = document.getElementById('search2')
    list.style.display = 'none';
    search.value = value;
    search.focus();
}

function getNumerical(id, cate) {
    let loading = document.getElementById('loading');
    if (!loading){
        $('.table-posts').append(`<div class="loading" id="loading">Loading&#8230;</div>`)
    }
    if (id - ao < 0) {
        vitri = id - ao;
        translateX = translateX - 180 * (vitri)
        main.style.transform = 'translateX(' + translateX + 'px)'
        active(id, ao)
    } else {
        vitri = id - ao;
        translateX = translateX - 180 * (vitri)
        main.style.transform = 'translateX(' + translateX + 'px)'
        active(id, ao)
    }
    reload(id, cate)
}

function reload(index, cate) {
    var currentUrl = window.location.href;
    var url  = new URL(currentUrl);
    url = url.origin + url.pathname

    let tri = index == 0 ? url : `/?cate=${cate}`
    $.ajax({
        url: tri,
        method: 'GET',
        success: function (data) {
            const parser = new DOMParser();
            const htmlDoc = parser.parseFromString(data, 'text/html');
            const newPosts = htmlDoc.getElementById('postsTable').innerHTML;
            document.getElementById('postsTable').innerHTML = newPosts;
        },
        error: function (xhr) {
            alert('Có lỗi xảy ra khi tải lại bảng.');
        }
    });
}

const debounceCategory = debounce(fetchApi, 300)

function fetchApi(index) {
    console.log('index : '+index)
    let endPoint = '/api/categories/'
    fetch(endPoint).then(res => res.json() )
        .then(data => {
           if (index !=0 ) {
               reload(index, data[index-1].id)
           }else {
               reload(index, 0)
           }
        })
}

pre.addEventListener('click', ()=> {
    let loading = document.getElementById('loading');
    if (!loading){
        $('.table-posts').append(`<div class="loading" id="loading">Loading&#8230;</div>`)
    }
    if (ao == 0) {
        translateX -= 180 * (length - 1);
        main.style.transform = 'translateX(' + translateX + 'px)'
        let index = ao - 1 + length;
        debounceCategory(length-1);
        active(index, ao);
    } else {
        translateX += 180;
        main.style.transform = 'translateX(' + translateX + 'px)';
        let index= ao - 1;
        debounceCategory(index);
        active(index, index + 1);
    }
})
next.addEventListener('click', ()=> {
    let loading = document.getElementById('loading');
    if (!loading){
        $('.table-posts').append(`<div class="loading" id="loading">Loading&#8230;</div>`)
    }
    let translate = 0
    if (ao == length-1) {
        translateX += 180 * (length - 1);
        translate = translateX
        main.style.transform = 'translateX(' + translate + 'px)'
        index = 0;
        debounceCategory(0);
        active(index, length-1);
    } else {
        translateX -= 180;
        translate = translateX
        main.style.transform = 'translateX(' + translate + 'px)'
        index = ao + 1;
        debounceCategory(index);
        active(index, index - 1);
    }
})







