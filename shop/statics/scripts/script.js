function menuAction(){
    menuIcon = document.getElementById('menu-btn-icon')
    menu = document.getElementById('menu')
    if(menuIcon.innerText === 'close'){
        menuIcon.innerText = 'menu'
        menu.style.width = '0px'
        menu.style.borderTop = 'none'
        menu.style.borderRight = 'none'
        menu.style.boxShadow = 'none'
    }else{
        if (window.innerWidth < 600)
            menu.style.width = '100%'
        else
            menu.style.width = '300px'
        menu.style.borderTop = '2px solid black'
        menu.style.borderRight = '2px solid black'
        menu.style.boxShadow = '1px 1px 2px 1px rgb(128, 128, 128)'
        menuIcon.innerText = 'close'
    }
}