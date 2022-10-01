$(document).ready(function () {
    
    $('#tabla').DataTable( {
        dom: 'Bfrtlip',
        buttons: [
            // {
            //     extend:'excelHtml5',
            //     text:'<i class="fas fa-file-excel"></i>',
            //     titleAttr:'Exportar a Excel',
            //     className:'btn btn-success'
            // },
            // {
            //     extend:'excelHtml5',
            //     text:'<i class="fas fa-file-pdf"></i>',
            //     titleAttr:'Exportar a PDF',
            //     className:'btn btn-danger'
            // },
            // {
            //     extend:'excelHtml5',
            //     text:'<i class="fas fa-print"></i>',
            //     titleAttr:'Imprimir',
            //     className:'btn btn-infor'
            // },
            'excel', 'pdf', 'print'
        ],
        destroy: true,
        searching:true,
        responsive: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por paginas",
            "zeroRecords": "Nada encontrado - diculpa",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': 'Buscar:',
            'paginate': {
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        }
        
    } );
});