/**
 * Created by PUSKOM on 6/10/2017.
 */

/* AKTIF MENU */
function menu_aktif(newURL) {
    var str = newURL;
    var item  = $('ul li a[href="' + str  + '"]');
    if(item.length){
        item.parent().addClass("active");
        var dropdown = item.parent().parent().parent();
        if(dropdown.hasClass("dropdown")){
            dropdown.addClass("active");
        }

    }
};

// Hideable menu bar
$(function() {
    // Setup Headroom.js
    // ------------------------------

    // Initialize top by default
    headroomTop();

    // Top navbar
    function headroomTop() {
        $(".navbar-fixed-top").headroom({
            classes: {
                pinned: "headroom-top-pinned",
                unpinned: "headroom-top-unpinned"
            },
            offset: $('.navbar').outerHeight(),
            onUnpin : function() {
                $('.navbar .dropdown-menu').parent().removeClass('open');
            }
        });
    }

});

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Pencarian:</span> _INPUT_',
            lengthMenu: '<span>Tampilkan:</span> _MENU_',
            info: 'Menampilkan _START_ - _END_ dari _TOTAL_ data',
            paginate: { 'first': 'Awal', 'last': 'Akhir', 'next': '&rarr;', 'previous': '&larr;' },
            zeroRecords: "Tidak ditemukan data yang sesuai"
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });


    // Basic initialization
    $('.datatable-button-init-basic').DataTable({
        buttons: {
            dom: {
                button: {
                    className: 'btn bg-blue legitRipple'
                }
            },
            buttons: [
                {extend: 'excel'},
                {extend: 'pdf'},
                {extend: 'print'}
            ]
        },responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [
            {
                className: 'control',
                orderable: false,
                targets:   0
            },
            {
                width: "550px",
                targets: [4]
            },
            {
                width: "50px",
                targets: [2]
            }
        ],
        order: [[ 2, "desc" ], [ 1, "asc" ]]
    });


    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Ketik pencarian...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

});