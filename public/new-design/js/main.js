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
