
let arrProfile =  ['/dashboard/', '/dashboard', '/dashboard/edit/', '/dashboard/edit', '/dashboard/edit-profile/', '/dashboard/edit-profile']

for (let i =0 ; i<arrProfile.length; i++){
    if (window.location.pathname==arrProfile[i]){
        let navigation = document.getElementsByClassName('navigation-hover')[0];
        navigation.style.background = 'var(--Background-card, rgba(255, 255, 255, 0.08))'
        navigation.style.borderRadius = '8px'
        break
    }
}

let arrHistoryReport =  ['/dashboard/histories']

for (let i =0 ; i<arrHistoryReport.length; i++){
    if (window.location.pathname==arrHistoryReport[i]){
        let navigation = document.getElementsByClassName('navigation-hover')[1];
        navigation.style.background = 'var(--Background-card, rgba(255, 255, 255, 0.08))'
        navigation.style.borderRadius = '8px'
        break
    }
}

let arrChangePass = ['/password/edit']

for (let i =0 ; i<arrChangePass.length; i++){
    if (window.location.pathname==arrChangePass[i]){
        let navigation = document.getElementsByClassName('navigation-hover')[2];
        navigation.style.background = 'var(--Background-card, rgba(255, 255, 255, 0.08))'
        navigation.style.borderRadius = '8px'
        break
    }
}
