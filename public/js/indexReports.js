let categories = document.getElementsByClassName('btn-category')
let url2 = new URL(window.location.href)
let search = window.location.search
let search2 = new URLSearchParams(search)
let cate = search2.get('cate')
let cateActive = -1
var urlKhongcoQuery = url2.origin + url2.pathname;
function reloadIndex(index) {
       let loading = document.getElementById('loading');
       if (!loading){
       $('.table-posts').append(`<div class="loading" id="loading">Loading&#8230;</div>`)
   }
    categories[index+1].style.background = 'var(--Light-primary, #009571)'
    categories[cateActive+1].style.background = 'var(--Light-Black, #2E2C29)'
    cateActive = index
    fetchCategory(index)
}

function reloadPage(index, cate) {
    let tri = index == -1 ? urlKhongcoQuery : urlKhongcoQuery+`?cate=${cate}`;
    $.ajax({
        url: tri,
        method: 'GET',
        success: function (data) {
            const parser = new DOMParser();
            const htmlDoc = parser.parseFromString(data, 'text/html');
            const panigation = htmlDoc.getElementById('panigation').innerHTML;
            const newPosts = htmlDoc.getElementsByClassName('table-posts')[0].innerHTML;
            document.getElementsByClassName('table-posts')[0].innerHTML = newPosts;
            document.getElementById('panigation').innerHTML = panigation
        },
        error: function (xhr) {
            alert('Có lỗi xảy ra khi tải lại bảng.');
        }
    });
}

function reloadReports(index, cate='all') {
        url2.searchParams.delete('page')
        url2.searchParams.set('cate', cate);
        let newUrl = url2.toString();
        let tri = index == -1 ? urlKhongcoQuery : '?cate='+cate
        console.log()

        $.ajax({
            url: tri,
            method: 'GET',
            success: function (data) {
                const parser = new DOMParser();
                const htmlDoc = parser.parseFromString(data, 'text/html');
                const newPosts = htmlDoc.getElementsByClassName('list-trader')[0].innerHTML;
                document.getElementsByClassName('list-trader')[0].innerHTML = newPosts;
            },
            error: function (xhr) {
                alert('Có lỗi xảy ra khi tải lại bảng.');
            }
        });
}

function fetchCategory(index) {
    let endPoint = '/api/categories/'
    fetch(endPoint).then(res => res.json() )
        .then(data => {
            if (url2.pathname =='/traders'){
                reloadReports(index, index!=-1 ? data[index].id : 'all')
            }else {
                reloadPage(index, index!=-1 ? data[index].id : 'all')
            }
        })
}
