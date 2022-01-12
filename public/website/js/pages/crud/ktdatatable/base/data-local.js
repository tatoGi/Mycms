'use strict';
// Class definition

var KTDatatableDataLocalDemo = function() {
  // Private functions

  // demo initializer
  var demo = function() {
    var dataJSONArray = JSON.parse(
        '[{"RecordID":1,"OrderID":"0374-5070","name_srurname":"ირაკლი ბანძელაძე","date_of_birth":"26.09.1878","segment":"ციფრული ტრანსფორმაცია","subdivision":"ციფრული ტრანსფორმაცია","position":"თანამშრომელი","mobile":"591 000 000","email":"info@ltb.ge"},\n' +
        '{"RecordID":1,"OrderID":"0374-5070","name_srurname":"ირაკლი ბანძელაძე","date_of_birth":"26.09.1878","segment":"ციფრული ტრანსფორმაცია","subdivision":"ციფრული ტრანსფორმაცია","position":"თანამშრომელი","mobile":"591 000 000","email":"info@ltb.ge"}]');

    var datatable = $('#kt_datatable').KTDatatable({
      // datasource definition
      data: {
        type: 'local',
        source: dataJSONArray,
        pageSize: 10,
      },

      // layout definition
      layout: {
        scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
        // height: 450, // datatable's body's fixed height
        footer: false, // display/hide footer
      },

      // column sorting
      sortable: true,

      pagination: true,

      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch',
      },

      // columns definition
      columns: [{
          field: 'name_srurname',
          title: 'სახელი გვარი',
        }, {
          field: 'date_of_birth',
          title: 'დაბადების თარიღი',
        }, {
          field: 'segment',
          title: 'განყოფილება',
          type: 'date',
          format: 'MM/DD/YYYY',
        }, {
          field: 'subdivision',
          title: 'ქვედანაყოფი',
        }, {
          field: 'position',
          title: 'პოზიცია',
        }, {
          field: 'mobile',
          title: 'ტელეფონი',
        }, {
          field: 'email',
          title: 'ელ-ფოსტა',
        }],
    });

    $('#kt_datatable_search_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#kt_datatable_search_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });

    $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
  };

  return {
    // Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableDataLocalDemo.init();
});
