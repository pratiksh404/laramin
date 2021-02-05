/* ======================================Datatable====================================== */
$(document).ready(function() {


     /**********************************
     *        Admin Global Datatable    *
     **********************************/
  /*     $('.datatable').DataTable({
        dom: '<"d-flex justify-content-between align-items-center btn-group">Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn mb-2'); */
                // Datatable
            $(".datatable").DataTable({
                "responsive": true,
                "autoWidth": true,
                "order": [],
                "info": true,
                "dom": '<"d-flex justify-content-between align-items-center btn-group">Bfrtip',
                "buttons": [
                    {
                       extend: 'copy',
                       exportOptions: {
                       columns: ':not(:last-child)',
                       }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                        columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                        columns: ':not(:last-child)',
                        }
                    },
                    {
                            extend: 'pdf',
                            exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                        columns: ':not(:last-child)',
                        }
                    }
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn mb-2');

     /**********************************
     *           Select2                  *
     **********************************/
    $('.select2').select2();

       // Vertical Scroll
   var vertical_scroll = new PerfectScrollbar(".vertical-scroll", {
      wheelPropagation: true
   });

      var horizontal_scroll = new PerfectScrollbar(".horizontal-scroll", {
      wheelPropagation: true
   });


});

/* Drop Zone */
Dropzone.options.dpzFileLimits = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 0.5, // MB
    maxFiles: 5,
    maxThumbnailFilesize: 1, // MB
    addRemoveLinks: true,
    dictRemoveFile: " Trash"
}

// Classic Editor
ClassicEditor
    .create( document.querySelector( '.texteditor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

    // Balloon Editor
/* BalloonEditor
    .create( document.querySelector( 'ballooneditor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
 */


/* ==================================================================================== */