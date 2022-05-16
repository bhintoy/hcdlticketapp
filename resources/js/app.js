// JQuery
import $ from 'jquery';
window.$ = window.jQuery = $;

// Bootstrap
require('bootstrap');

// AdminLTE
require('admin-lte');

// RUT.js
const { format } = require('rut.js');
window.format = format;

// Select2
require('admin-lte/plugins/select2/js/select2');

// DataTables
require('admin-lte/plugins/datatables/jquery.dataTables');
require('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4');

// SweetAlert2
const Swal = require('admin-lte/plugins/sweetalert2/sweetalert2');
window.Swal = Swal;
