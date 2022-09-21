let SideClick = document.querySelector('#SideClick');
let bodyScrollPart = document.querySelector('#bodyScrollPart');

SideClick.addEventListener('click', ()=>{
    bodyScrollPart.classList.toggle('show')
})
