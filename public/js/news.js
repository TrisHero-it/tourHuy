
let arrNews =  ['/news']

for (let i =0 ; i<arrNews.length; i++){
    if (window.location.pathname==arrNews[i]){
        let navigation = document.getElementsByClassName('navigation-hover')[0];
        navigation.style.background = 'var(--Background-Popup, #091E22)'
        navigation.style.borderRadius = '8px'
        break
    }
}

