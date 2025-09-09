 function titleSeo() {
    let title = document.getElementsByName('title')[0];
    if (title.value.trim() =='') {
        document.getElementById('titleSeo').innerHTML = `
        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Độ rộng của tiêu đề SEO: Hãy tạo một tiêu đề SEO.
        `
    }else {
        document.getElementById('titleSeo').innerHTML = `
        <div style="width: 10px; height: 10px">
<svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                        Độ rộng của tiêu đề SEO: Rất tốt!

        `
    }
 }

 function keyWordsSeo() {
     let keyWords = document.getElementsByName('key_words')[0];
     if (keyWords.value.trim() =='') {
         document.getElementById('keyWords').innerHTML = `
        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                       Độ dài cụm từ khóa: Không có cụm từ khóa chính nào được đặt cho trang này. Hãy đặt một cụm từ khóa để tính điểm SEO.
        `
     }else {
         document.getElementById('keyWords').innerHTML = `
        <div style="width: 10px; height: 10px">
<svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                       Độ dài cụm từ khóa: Rất tốt!
        `
     }
 }

 function checkMetaSeo() {
    let meta = document.getElementsByName('meta')[0];
     console.log(document.getElementsByName('key_words')[0].value.trim());
     if (meta.value.trim() =='') {
         document.getElementById('metaSeo').innerHTML = `
        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                       Độ dài mô tả Meta: Không có mô tả meta. Các máy tìm kiếm sẽ hiển thị đoạn văn bản từ trang. Hãy đảm bảo viết một mô tả!
        `
     }
     else{
         let arrKeywords = document.getElementsByName('key_words')[0].value.trim().split(',')
         let j= 0;
         for (let i= 0; i<arrKeywords.length; i++) {
             if(!meta.value.trim().toLowerCase().includes(arrKeywords[i])) {
                j=1;
             }
         }
         if (j==1) {
             document.getElementById('metaSeo').innerHTML = `
        <div style="width: 10px; height: 10px">
                            <svg style="transform: translateY(-7px)" aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#dc3232"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                       Độ dài mô tả Meta: Trong meta phải chứa từ khoá(keyword)!
        `
         }else {
             document.getElementById('metaSeo').innerHTML = `
        <div style="width: 10px; height: 10px">
<svg style="transform: translateY(-7px)"  aria-hidden="true" role="img" focusable="false" class="sc-bcXHqe fYBLbR yoast-svg-icon yoast-svg-icon-circle sc-fmZqYP jRPVdB" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" fill="#7ad03a"><path d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path></svg>
                        </div>
                      Độ dài mô tả Meta: Rất tốt!
        `
         }

     }

 }

