var dataTableBasic = {
  orderCellsTop: true,
  fixedHeader: false,
  language: {
    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
  },
  searching: true,
  responsive: true,
  lengthChange: true,
  autoWidth: false,
  info: true,
  paging: true,
  pageLength: 25,
  ordering: true,
  order: [[0, 'desc']],
  lengthMenu: [
    [10, 25, 50, 100, 200],
    ['10', '25', '50', '100', '200']
  ]
};

var dataTableMedium = {
  orderCellsTop: true,
  fixedHeader: false,
  language: {
    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
  },
  searching: true,
  responsive: true,
  lengthChange: true,
  autoWidth: false,
  info: true,
  paging: true,
  pageLength: 25,
  order: [[0, 'desc']],
  ordering: true,
  dom: '<"top d-flex flex-wrap justify-content-sm-between justify-content-center"lf>Brt<"bottom d-flex flex-wrap justify-content-sm-between justify-content-center"ip><"clear">',
  lengthMenu: [
    [10, 25, 50, 100, 200],
    ['10', '25', '50', '100', '200']
  ],
  buttons: [{
    extend: 'excel',
    text: 'XLSX',
    titleAttr: 'Exportar a Excel',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'pdf',
    text: 'PDF',
    titleAttr: 'Exportar a PDF',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'copy',
    text: ' COPIAR',
    titleAttr: 'Copy',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'print',
    text: ' IMPRIMIR',
    titleAttr: 'Imprimir',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
    }
  }]
};

var dataTableComplete = {
  orderCellsTop: true,
  fixedHeader: false,
  language: {
    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
  },
  searching: true,
  responsive: false,
  lengthChange: true,
  autoWidth: false,
  info: true,
  paging: true,
  pageLength: 50,
  order: [[0, 'desc']],
  ordering: true,
  dom: '<"top d-flex flex-wrap justify-content-sm-between justify-content-center"lf>Brt<"bottom d-flex flex-wrap justify-content-sm-between justify-content-center"ip><"clear">',
  lengthMenu: [
    [10, 25, 50, 100, 200],
    ['10', '25', '50', '100', '200']
  ],
  buttons: [{
    extend: 'excel',
    text: 'XLSX',
    titleAttr: 'Exportar a Excel',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'csv',
    text: ' CSV',
    titleAttr: 'CSV',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'pdf',
    text: 'PDF',
    titleAttr: 'Exportar a PDF',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'copy',
    text: ' COPIAR',
    titleAttr: 'Copy',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
    }
  },
  {
    extend: 'print',
    text: ' IMPRIMIR',
    titleAttr: 'Imprimir',
    className: 'btn btn-secondary',
    exportOptions: {
      columns: ':visible'
      //columns: [0, ':visible']
    }
  },
  {
    extend: 'colvis',
    text: ' Columna Visible',
    titleAttr: 'Col Visible',
    className: 'btn btn-secondary'
  }]
};

var dataTableSum = {
  orderCellsTop: true,
  fixedHeader: false,
  language: {
    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
  },
  searching: true,
  responsive: true,
  lengthChange: true,
  autoWidth: false,
  info: true,
  paging: true,
  pageLength: 25,
  ordering: true,
  dom: '<"top d-flex flex-wrap justify-content-sm-between justify-content-center"lf>Brt<"bottom d-flex flex-wrap justify-content-sm-between justify-content-center"ip><"clear">',
  drawCallback: function () {
    var api = this.api();
    $(api.column(6).footer()).html(
      'Total : ' + api.column(6, {
        page: 'current'
      }).data().sum()
    );
  }
};
