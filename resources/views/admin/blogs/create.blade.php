@extends('admin.layout.app')
@section('link')
<link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap-timepicker.min.css')}}">
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endsection
@section('content')
<div style="position: fixed; right: 23px; top: 30px; z-index: 1102;" id="notification">

</div>
<div class="col-md-12" id="post">
    <div class="card">
        <div class="card-header">
            <h5>Thêm blog</h5>
        </div>

        <form action="/admin/blogs" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1"> Ảnh thumbnail</label>
                    <input name="image" type="file" class="form-control">
                    <div class="thongbao" style="font-size: .875em; color: red"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1"> Tiêu đề của tin tức </label>
                    <input name="title" onkeyup="titleSeo()" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="" placeholder="Tiêu đề của tin tức">
                    <div class="thongbao" style="font-size: .875em; color: red"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1"> Từ khoá để tìm kiếm</label>
                    <input name="key_words" onkeyup="keyWordsSeo()" type="text" class="form-control" placeholder="Từ khoá 1, từ khoá 2, từ   khoá 3,...">
                    <div class="thongbao" style="font-size: .875em; color: red"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1"> Mô tả ngắn</label>
                    <input name="meta" type="text" onkeyup="checkMetaSeo()" class="form-control" placeholder="Đoạn mô tả không được vượt quá 156 kí tự">
                    <div class="thongbao" style="font-size: .875em; color: red"></div>
                </div>

                <div class="mb-3">
                    <textarea name="content" id="editor">

                        </textarea>
                </div>

                <div class="mb-3 d-flex">
                    <button class="btn btn-success">Thêm bài viết</button>
                </div>
                <div class="d-flex align-items-center" id="keyWords" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Độ dài cụm từ khóa: Không có cụm từ khóa chính nào được đặt cho trang này. Hãy đặt một cụm từ khóa để tính điểm SEO.
                </div>

                <div class="mt-2 align-items-center" id="titleSeo" style="display: flex ;gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Độ rộng của tiêu đề SEO: Hãy tạo một tiêu đề SEO.
                </div>
                <div class="d-flex mt-2 align-items-center" id="metaSeo" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Độ dài mô tả Meta: Không có mô tả meta. Các máy tìm kiếm sẽ hiển thị đoạn văn bản từ trang. Hãy đảm bảo viết một mô tả!
                </div>

                <div class="d-flex mt-2 align-items-center" id="countWord" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Độ dài văn bản: Văn bản chứa 0 các từ. Độ dài này quá ngắn so với số lượng tối thiểu 300 các từ được khuyến nghị. Hãy thêm nội dung.
                </div>


                <div class="d-flex mt-2 align-items-center" id="outLink" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Các đường dẫn ra ngoài trang: Không có các đường dẫn ra ngoài trang. Hãy thêm một số đường dẫn!
                </div>

                <div class="d-flex mt-2 align-items-center" id="imgSeo" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Hình ảnh: Không có hình ảnh nào xuất hiện trên trang này. Thêm một số!
                </div>

                <div class="d-flex mt-2 align-items-center" id="inLink" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Các đường dẫn nội bộ: Không có đường dẫn nội bộ trong trang này, Hãy thêm một số đường dẫn nội bộ tốt!
                </div>

                <div class="d-flex mt-2 align-items-center" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Cụm từ khóa trong phần giới thiệu: Cụm từ khóa của bạn hoặc các từ đồng nghĩa với nó không xuất hiện trong đoạn văn đầu. Hãy làm cho chủ đề bài viết rõ ràng ngay.
                </div>

                <div class="d-flex mt-2 align-items-center" id="keyWordsCountsSeo" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Mật độ từ khóa: Từ khóa được tìm thấy 0 lần. Ít hơn mức tối thiểu được đề xuất là 2 lần cho một văn bản có độ dài này. Hãy tập trung vào từ khóa của bạn!
                </div>

                <div class="d-flex mt-2 align-items-center" id="titleSeo2" style="gap: 8px">
                    <div style="width: 10px; height: 10px">
                        <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232">
                            <path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                        </svg>
                    </div>
                    Tiêu đề phụ: Chưa có tiêu đề phụ!
                </div>

            </div>
        </form>
    </div>
</div>
<script src="{{asset('js/seoNews.js')}}"></script>
<script !src="">
    function Category(value) {
        let arrCate = '';
        let arrCategory = document.querySelectorAll('.choices__list--multiple .choices__item--selectable');
        for (let i = 0; i < arrCategory.length; i++) {
            arrCate += i == 0 ? arrCategory[i].dataset.value : ',' + arrCategory[i].dataset.value
        }
        let CategoryId = document.getElementsByName('category_id')[0];
        CategoryId.value = arrCate
    }
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{route('upload-image', ['_token'=>csrf_token()])}}"
            }
        })
        .then(editor => {
            // Khi cần kiểm tra số lượng thẻ <h2>
            function countH2Tags() {
                // Lấy nội dung từ CKEditor
                var htmlContent = editor.getData();

                // Sử dụng DOMParser để phân tích chuỗi HTML
                var parser = new DOMParser();
                var doc = parser.parseFromString(htmlContent, 'text/html');

                // Đếm số lượng thẻ <h2>
                var h2Tags = doc.getElementsByTagName('h2');

                if (h2Tags.length >= 1) {
                    document.getElementById('titleSeo2').innerHTML = `
                        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                            Tiêu đề phụ: Rất tốt!
                    `
                } else {
                    document.getElementById('titleSeo2').innerHTML = `
                            <div style="width: 10px; height: 10px">
                                <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                            </div>
                            Tiêu đề phụ: Chưa có tiêu đề phụ!
                        `
                }
            }

            // Kiểm tra xem giữa các thẻ h2 có bao nhiêu thẻ p, trong thẻ p có bao nhiêu chữ và có hình ảnh hay không
            function checkContentAfterHeader() {
                // Lấy nội dung từ CKEditor
                var htmlContent = editor.getData();

                // Sử dụng DOMParser để phân tích chuỗi HTML
                var parser = new DOMParser();
                var doc = parser.parseFromString(htmlContent, 'text/html');

                // Lấy tất cả các thẻ <h1>
                var h2Tags = doc.getElementsByTagName('h2');
                // Duyệt qua tất cả các thẻ <h1>
                for (var i = 0; i < h2Tags.length; i++) {
                    // Lấy phần tử kế tiếp sau thẻ <h1>
                    var nextElement = h2Tags[i].nextElementSibling;

                    // Kiểm tra xem phần tử kế tiếp có phải là thẻ <p> không
                    if (h2Tags) {
                        var currentNode = h2Tags[i].nextSibling;
                        var totalCharacters = 0;
                        var imgFound = false;

                        // Duyệt qua các phần tử sau thẻ <h2>
                        while (currentNode) {

                            // Nếu gặp thẻ <p>, đếm số ký tự bên trong
                            if (currentNode.nodeType === Node.ELEMENT_NODE && currentNode.tagName.toLowerCase() === 'p') {
                                if (currentNode.querySelector('img')) {
                                    imgFound = true;
                                    break;
                                }
                                totalCharacters += currentNode.textContent.length;
                            }
                            currentNode = currentNode.nextSibling;
                        }
                        if (imgFound) {
                            document.getElementById('imgSeo').innerHTML = `
                                <div style="width: 10px; height: 10px">
<svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Hình ảnh: Rất tốt!
                                `
                        } else {
                            document.getElementById('imgSeo').innerHTML = `
                                <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Hình ảnh: Không có hình ảnh nào xuất hiện trên trang này. Thêm một số!
                                `
                        }
                    }
                }
            }

            // kiểm tra bài viết có bao nhiêu từ
            function countWords() {
                // Lấy nội dung từ CKEditor
                var htmlContent = editor.getData();

                // Sử dụng DOMParser để phân tích chuỗi HTML
                var parser = new DOMParser();
                var doc = parser.parseFromString(htmlContent, 'text/html');

                // Lấy toàn bộ văn bản từ nội dung
                var textContent = doc.body.textContent || doc.body.innerText;

                // Đếm số lượng chữ trong văn bản
                var characterCount = textContent.replace(/\s+/g, '').length;
                var countWord = document.getElementById('countWord')
                if (characterCount <= 300) {
                    countWord.innerHTML = `
                        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Độ dài văn bản: Văn bản chứa ${characterCount} các từ. Độ dài này quá ngắn so với số lượng tối thiểu 300 các từ được khuyến nghị. Hãy thêm nội dung.
                        `
                } else {
                    countWord.innerHTML = `
                        <div style="width: 10px; height: 10px">
<svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Độ dài văn bản: rất tốt!
                        `

                }
            }

            // Kiểm tra đường dẫn ra ngoài trang
            function linkSeo() {
                var htmlContent = editor.getData();

                // Sử dụng DOMParser để phân tích chuỗi HTML
                var parser = new DOMParser();
                var doc = parser.parseFromString(htmlContent, 'text/html');

                // Lấy tất cả các thẻ <p>
                var pTags = doc.querySelectorAll('p');

                // URL của trang hiện tại
                var currentHost = window.location.host;
                var inLink = 0;
                var outLink = 0;
                pTags.forEach(function(pTag) {
                    // Lấy tất cả các thẻ <a> bên trong thẻ <p>
                    var aTags = pTag.querySelectorAll('a');

                    aTags.forEach(function(aTag) {
                        var linkHref = aTag.href;

                        // Kiểm tra xem link có trỏ ra ngoài trang hiện tại hay không
                        if (linkHref.includes(currentHost)) {
                            inLink++;
                        } else {
                            outLink++
                        }
                    });
                });
                if (inLink >= 1) {
                    document.getElementById('inLink').innerHTML = `
                        <div style="width: 10px; height: 10px">
<svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Các đường dẫn nội bộ: toẹt vời!
                        `;
                } else {
                    document.getElementById('inLink').innerHTML = `
                        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Các đường dẫn nội bộ: Không có đường dẫn nội bộ trong trang này, Hãy thêm một số đường dẫn nội bộ tốt!
                        `;
                }

                if (outLink >= 1) {
                    document.getElementById('outLink').innerHTML = `
                        <div style="width: 10px; height: 10px">
<svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Các đường dẫn ra ngoài trang: toẹt vời!
                        `;
                } else {
                    document.getElementById('outLink').innerHTML = `
                        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Các đường dẫn ra ngoài trang: Không có các đường dẫn ra ngoài trang. Hãy thêm một số đường dẫn!
                        `;
                }

            }

            // Kiểm tra số lần từ khoá xuất hiện ở trong phần body
            function countKeyWordsSeo() {
                var htmlContent = editor.getData();

                // Sử dụng DOMParser để phân tích chuỗi HTML
                var parser = new DOMParser();
                var doc = parser.parseFromString(htmlContent, 'text/html');
                var textContent = doc.body.textContent || doc.body.innerText;
                var keyword = document.getElementsByName('key_words')[0].value;
                var arrKeyWord = keyword.split(',')
                var checkRegex;
                var count = 0;
                var totalCount = 0;
                for ($i = 0; $i < arrKeyWord.length; $i++) {
                    checkRegex = new RegExp(arrKeyWord[$i], 'gi');
                    count = (textContent.match(checkRegex) || []).length;
                    totalCount += count;
                }

                if (totalCount >= 2) {
                    document.getElementById('keyWordsCountsSeo').innerHTML = `
                        <div style="width: 10px; height: 10px">
<svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Mật độ từ khóa: Từ khóa được tìm thấy ${totalCount} lần. Thật tuyệt!
                        `
                } else {
                    document.getElementById('keyWordsCountsSeo').innerHTML = `
                        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Mật độ từ khóa: Từ khóa được tìm thấy ${totalCount} lần. Ít hơn mức tối thiểu được đề xuất là 2 lần cho một văn bản có độ dài này. Hãy tập trung vào từ khóa của bạn!
                        `
                }
            }

            editor.model.document.on('change:data', () => {
                countWords()
                checkContentAfterHeader()
                linkSeo()
                countH2Tags()
                countKeyWordsSeo();

            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script !src="">
    let divImgAds = document.getElementById('divImgAds');
    let imgInput = document.getElementsByName('image')[0];

    imgInput.addEventListener('change', (event) => {

        const reader = new FileReader();
        reader.onload = function(e) {
            let html = `
                <div class="i-block" style="border: none" data-clipboard-text="mdi mdi-airballoon" data-filter="mdi-airballoon" data-bs-toggle="tooltip" aria-label="mdi-airballoon" data-bs-original-title="mdi-airballoon">
                            <i style="color: var(--Light-primary, #009571); font-size: 35px" class="mdi mdi-arrow-right-bold-outline"></i>
                        </div>
                        <img style="width: 200px; height: 200px" class="mb-3" src="asd" id="imgAds" alt="">
                       `
            document.getElementById('avc').innerHTML = html;
            const imgAds = document.getElementById('imgAds');
            imgAds.src = e.target.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    })

    function validate() {
        let link = document.getElementsByName('link')[0];
        let check = true;
        let thongbao = document.getElementsByClassName('thongbao');
        let regexLink = /^(https?:\/\/)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}([\/a-zA-Z0-9#?&%=~_\-\.]*)?$/;
        if (link.value.trim() == '') {
            thongbao[1].innerHTML = 'Link không được để trống';
            link.style.borderColor = 'var(--bs-form-invalid-border-color'
            check = false
        } else if (!regexLink.test(link.value.trim())) {
            thongbao[1].innerHTML = 'Đây phải điền link';
            link.style.borderColor = 'var(--bs-form-invalid-border-color'
            check = false
        } else {
            thongbao[1].innerHTML = ''
        }

        return check
    }
</script>

@if(session('success'))
<script !src="">
    let html = `
        <div class="toast toast-3 mb-2 fade show" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{asset('images/design/favicon_io/favicon.ico')}}" alt="" class="img-fluid m-r-5" style="width:20px;">
                <strong class="me-auto">Sinh travel</strong>
                <small class="text-muted">1 Giây</small>
                <button type="button" class="m-l-5 mb-1 mt-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
                </button>
            </div>
            <div class="toast-body">
                Thêm thành công !!
            </div>
        </div> `
    $('#notification').prepend(html)
    setTimeout(() => {
        let a = document.getElementById('toast');
        a.style.transition = '0.2s ease all';
        a.style.transform = 'translateX(200%)';
        setTimeout(() => {
            document.getElementById('toast').remove()
        }, 1000)
    }, 2000)
</script>
@endif
<script src="{{asset('assets/js/plugins/choices.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var genericExamples = document.querySelectorAll('[data-trigger]');
        for (i = 0; i < genericExamples.length; ++i) {
            var element = genericExamples[i];
            new Choices(element, {
                placeholderValue: 'This is a placeholder set in the config',
                searchPlaceholderValue: 'This is a search placeholder',
            });
        }

        var textRemove = new Choices(
            document.getElementById('choices-text-remove-button'), {
                delimiter: ',',
                editItems: true,
                maxItemCount: 5,
                removeItemButton: true,
            }
        );

        var textUniqueVals = new Choices('#choices-text-unique-values', {
            paste: false,
            duplicateItemsAllowed: false,
            editItems: true,
        });

        var texti18n = new Choices('#choices-text-i18n', {
            paste: false,
            duplicateItemsAllowed: false,
            editItems: true,
            maxItemCount: 5,
            addItemText: function(value) {
                return (
                    'Appuyez sur Entrée pour ajouter <b>"' + String(value) + '"</b>'
                );
            },
            maxItemText: function(maxItemCount) {
                return String(maxItemCount) + 'valeurs peuvent être ajoutées';
            },
            uniqueItemText: 'Cette valeur est déjà présente',
        });

        var textEmailFilter = new Choices('#choices-text-email-filter', {
            editItems: true,
            addItemFilter: function(value) {
                if (!value) {
                    return false;
                }

                const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                const expression = new RegExp(regex.source, 'i');
                return expression.test(value);
            },
        }).setValue(['joe@bloggs.com']);

        var textDisabled = new Choices('#choices-text-disabled', {
            addItems: false,
            removeItems: false,
        }).disable();

        var textPrependAppendVal = new Choices(
            '#choices-text-prepend-append-value', {
                prependValue: 'item-',
                appendValue: '-' + Date.now(),
            }
        ).removeActiveItems();

        var textPresetVal = new Choices('#choices-text-preset-values', {
            items: [
                'Josh Johnson',
                {
                    value: 'joe@bloggs.co.uk',
                    label: 'Joe Bloggs',
                    customProperties: {
                        description: 'Joe Blogg is such a generic name',
                    },
                },
            ],
        });

        var multipleDefault = new Choices(
            document.getElementById('choices-multiple-groups')
        );

        var multipleFetch = new Choices('#choices-multiple-remote-fetch', {
            placeholder: true,
            placeholderValue: 'Pick an Strokes record',
            maxItemCount: 5,
        }).setChoices(function() {
            return fetch(
                    'https://api.discogs.com/artists/55980/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW'
                )
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    return data.releases.map(function(release) {
                        return {
                            value: release.title,
                            label: release.title
                        };
                    });
                });
        });

        var multipleCancelButton = new Choices(
            '#choices-multiple-remove-button', {
                removeItemButton: true,
            }
        );

        /* Use label on event */
        var choicesSelect = new Choices('#choices-multiple-labels', {
            removeItemButton: true,
            choices: [{
                    value: 'One',
                    label: 'Label One'
                },
                {
                    value: 'Two',
                    label: 'Label Two',
                    disabled: true
                },
                {
                    value: 'Three',
                    label: 'Label Three'
                },
            ],
        }).setChoices(
            [{
                    value: 'Four',
                    label: 'Label Four',
                    disabled: true
                },
                {
                    value: 'Five',
                    label: 'Label Five'
                },
                {
                    value: 'Six',
                    label: 'Label Six',
                    selected: true
                },
            ],
            'value',
            'label',
            false
        );

        choicesSelect.passedElement.element.addEventListener(
            'addItem',
            function(event) {
                document.getElementById('message').innerHTML =
                    '<span class="badge bg-light-primary"> You just added "' + event.detail.label + '"</span>';
            }
        );
        choicesSelect.passedElement.element.addEventListener(
            'removeItem',
            function(event) {
                document.getElementById('message').innerHTML =
                    '<span class="badge bg-light-danger"> You just removed "' + event.detail.label + '"</span>';
            }
        );

        var singleFetch = new Choices('#choices-single-remote-fetch', {
                searchPlaceholderValue: 'Search for an Arctic Monkeys record',
            })
            .setChoices(function() {
                return fetch(
                        'https://api.discogs.com/artists/391170/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW'
                    )
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        return data.releases.map(function(release) {
                            return {
                                label: release.title,
                                value: release.title
                            };
                        });
                    });
            })
            .then(function(instance) {
                instance.setChoiceByValue('Fake Tales Of San Francisco');
            });

        var singleXhrRemove = new Choices('#choices-single-remove-xhr', {
            removeItemButton: true,
            searchPlaceholderValue: "Search for a Smiths' record",
        }).setChoices(function(callback) {
            return fetch(
                    'https://api.discogs.com/artists/83080/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW'
                )
                .then(function(res) {
                    return res.json();
                })
                .then(function(data) {
                    return data.releases.map(function(release) {
                        return {
                            label: release.title,
                            value: release.title
                        };
                    });
                });
        });

        var singleNoSearch = new Choices('#choices-single-no-search', {
            searchEnabled: false,
            removeItemButton: true,
            choices: [{
                    value: 'One',
                    label: 'Label One'
                },
                {
                    value: 'Two',
                    label: 'Label Two',
                    disabled: true
                },
                {
                    value: 'Three',
                    label: 'Label Three'
                },
            ],
        }).setChoices(
            [{
                    value: 'Four',
                    label: 'Label Four',
                    disabled: true
                },
                {
                    value: 'Five',
                    label: 'Label Five'
                },
                {
                    value: 'Six',
                    label: 'Label Six',
                    selected: true
                },
            ],
            'value',
            'label',
            false
        );

        var singlePresetOpts = new Choices('#choices-single-preset-options', {
            placeholder: true,
        }).setChoices(
            [{
                    label: 'Group one',
                    id: 1,
                    disabled: false,
                    choices: [{
                            value: 'Child One',
                            label: 'Child One',
                            selected: true
                        },
                        {
                            value: 'Child Two',
                            label: 'Child Two',
                            disabled: true
                        },
                        {
                            value: 'Child Three',
                            label: 'Child Three'
                        },
                    ],
                },
                {
                    label: 'Group two',
                    id: 2,
                    disabled: false,
                    choices: [{
                            value: 'Child Four',
                            label: 'Child Four',
                            disabled: true
                        },
                        {
                            value: 'Child Five',
                            label: 'Child Five'
                        },
                        {
                            value: 'Child Six',
                            label: 'Child Six'
                        },
                    ],
                },
            ],
            'value',
            'label'
        );

        var singleSelectedOpt = new Choices('#choices-single-selected-option', {
            searchFields: ['label', 'value', 'customProperties.description'],
            choices: [{
                    value: 'One',
                    label: 'Label One',
                    selected: true
                },
                {
                    value: 'Two',
                    label: 'Label Two',
                    disabled: true
                },
                {
                    value: 'Three',
                    label: 'Label Three',
                    customProperties: {
                        description: 'This option is fantastic',
                    },
                },
            ],
        }).setChoiceByValue('Two');

        var customChoicesPropertiesViaDataAttributes = new Choices(
            '#choices-with-custom-props-via-html', {
                searchFields: ['label', 'value', 'customProperties'],
            }
        );

        var singleNoSorting = new Choices('#choices-single-no-sorting', {
            shouldSort: false,
        });

        var cities = new Choices(document.getElementById('cities'));
        var tubeStations = new Choices(
            document.getElementById('tube-stations')
        ).disable();

        cities.passedElement.element.addEventListener('change', function(e) {
            if (e.detail.value === 'London') {
                tubeStations.enable();
            } else {
                tubeStations.disable();
            }
        });

        var customTemplates = new Choices(
            document.getElementById('choices-single-custom-templates'), {
                callbackOnCreateTemplates: function(strToEl) {
                    var classNames = this.config.classNames;
                    var itemSelectText = this.config.itemSelectText;
                    return {
                        item: function(classNames, data) {
                            return strToEl(
                                '\
                                        <div\
                                        class="' +
                                String(classNames.item) +
                                ' ' +
                                String(
                                    data.highlighted ?
                                    classNames.highlightedState :
                                    classNames.itemSelectable
                                ) +
                                '"\
                                        data-item\
                                        data-id="' +
                                String(data.id) +
                                '"\
                                        data-value="' +
                                String(data.value) +
                                '"\
                                        ' +
                                String(data.active ? 'aria-selected="true"' : '') +
                                '\
                                        ' +
                                String(data.disabled ? 'aria-disabled="true"' : '') +
                                '\
                                        >\
                                        <span style="margin-right:10px;">🎉</span> ' +
                                String(data.label) +
                                '\
                                        </div>\
                                        '
                            );
                        },
                        choice: function(classNames, data) {
                            return strToEl(
                                '\
                                        <div\
                                        class="' +
                                String(classNames.item) +
                                ' ' +
                                String(classNames.itemChoice) +
                                ' ' +
                                String(
                                    data.disabled ?
                                    classNames.itemDisabled :
                                    classNames.itemSelectable
                                ) +
                                '"\
                                        data-select-text="' +
                                String(itemSelectText) +
                                '"\
                                        data-choice \
                                        ' +
                                String(
                                    data.disabled ?
                                    'data-choice-disabled aria-disabled="true"' :
                                    'data-choice-selectable'
                                ) +
                                '\
                                        data-id="' +
                                String(data.id) +
                                '"\
                                        data-value="' +
                                String(data.value) +
                                '"\
                                        ' +
                                String(
                                    data.groupId > 0 ? 'role="treeitem"' : 'role="option"'
                                ) +
                                '\
                                        >\
                                        <span style="margin-right:10px;">👉🏽</span> ' +
                                String(data.label) +
                                '\
                                        </div>\
                                        '
                            );
                        },
                    };
                },
            }
        );

        var resetSimple = new Choices(document.getElementById('reset-simple'));

        var resetMultiple = new Choices('#reset-multiple', {
            removeItemButton: true,
        });
    });
</script>

@endsection