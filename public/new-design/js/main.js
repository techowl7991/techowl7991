let SideClick = document.querySelector('#SideClick');
let bodyScrollPart = document.querySelector('#bodyScrollPart');

SideClick.addEventListener('click', ()=>{
    bodyScrollPart.classList.toggle('show')
})


// calendar
$("#basicDate").flatpickr({
    dateFormat: "Y-m-d"
});
$("#endDate").flatpickr({
    dateFormat: "Y-m-d"
});

// Time
