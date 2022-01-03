$(function() {
    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Pencarian:</span> _INPUT_',
            searchPlaceholder : 'Ketikkan katakunci ...',
            lengthMenu: '<span>Tampilkan:</span> _MENU_',
            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            emptyTable: "Tidak ada data pada tabel",
            zeroRecords:    "Tidak ada data yang sesuai dengan katakunci",
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    $('#tabel-pengumuman').DataTable({
        responsive: {
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
                width: "150px",
                orderable: false,
                targets: [6]
            }
        ]
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

    $('.tabel-pengumuman').DataTable({
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
                width: "500px",
                targets: [3]
            },
            {
                width: "50px",
                targets: [4]
            }
        ],
        ordering: false
    });

    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Ketikkan kata kunci').width('120px');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

});