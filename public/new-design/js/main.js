let SideClick = document.querySelector('#SideClick');
let bodyScrollPart = document.querySelector('#bodyScrollPart');

SideClick.addEventListener('click', ()=>{
    bodyScrollPart.classList.toggle('show')
})


// calendar
$("#basicDate").flatpickr({
    dateFormat: "Y-m-d",
    disableMobile: "true"
});
$("#endDate").flatpickr({
    dateFormat: "Y-m-d",
    disableMobile: "true"
});

// Time
$(document).ready(function() {
    $('#example').DataTable({
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    });
    
} );

// radio button

let check1 = document.getElementById('flexRadioDefault1');
let check2 = document.getElementById('flexRadioDefault2');
let show1 = document.getElementById('show1');
let show2 = document.getElementById('show2');

check1.addEventListener('click', ()=>{
    show1.classList.remove('d-none')
    show2.classList.add('d-none')

})

check2.addEventListener('click', ()=>{
    show2.classList.remove('d-none')
    show1.classList.add('d-none')
})


// password hide& show

$("#eye").click(function() {

    $(this).toggleClass("img-eye img-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });



