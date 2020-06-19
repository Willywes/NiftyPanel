$(window).on('beforeunload', function () {
    $('body').addClass('overflow-hidden');
    $('.loader').fadeIn();
});

$(document).ready(function () {
    $('.loader').fadeOut();
    $('body').removeClass('overflow-hidden');

    try {
        jQuery.fn.bootstrapTable.defaults.icons = {
            paginationSwitchDown: 'demo-pli-arrow-down',
            paginationSwitchUp: 'demo-pli-arrow-up',
            refresh: 'demo-pli-repeat-2',
            toggle: 'demo-pli-layout-grid',
            columns: 'demo-pli-check',
            export: 'demo-pli-download-from-cloud',
            detailOpen: 'demo-psi-add',
            detailClose: 'demo-psi-remove'
        };
    } catch (error) {

    }
});

$('#table-bs').on('page-change.bs.table', function (d)
{
    runActiveControl()
});

$('#table-bs').on('column-switch.bs.table', function (d) {

    runActiveControl()
});

// $('#table-bs').on('post-body.bs.table', function (d) {
//
//     runActiveControl()
// });


function runActiveControl(){
    try{
        preparedChangeStatus();
    }catch (e) {
        console.log(e);
    }
    $('.toggle-bs').bootstrapToggle();
}

function showLoading() {
    $('.loader').fadeIn();
}

function hideLoading() {
    $('.loader').fadeOut();
}


// parche para evitar numebro cientifico input number
function precise(elem) {
    elem.value = Number(elem.value).toFixed(5);
}


function checkRut(name) {
    var clean = $('#' + name).val().replace(/[^0-9Kk]/g, "");
    // don't move cursor to end if no change
    if (clean !== $('#' + name).val()) $('#' + name).val(clean);
}

function checkAddress(name) {
    var clean = $('#' + name).val().replace(/[^0-9a-zA-Z-#áéíóúÁÉÍÓÚñÑ ]/g, "");
    // don't move cursor to end if no change
    if (clean !== $('#' + name).val()) $('#' + name).val(clean);
}

function checkPhone(name) {

    // don't move cursor to end if no change

    var clean = $('#' + name).val().replace(/[^0-9+]/g, "");

    if (clean !== $('#' + name).val()) $('#' + name).val(clean);
}

function checkNames(name) {
    var clean = $('#' + name).val().replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ ]/g, "");
    // don't move cursor to end if no change
    if (clean !== $('#' + name).val()) $('#' + name).val(clean);
}

function checkCosas(name) {
    var clean = $('#' + name).val().replace(/[^0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]/g, "");
    // don't move cursor to end if no change
    if (clean !== $('#' + name).val()) $('#' + name).val(clean);
}

function checkKey8(name) {
    var clean = $('#' + name).val().replace(/[^0-9a-zA-ZáéíóúÁÉÍÓÚñÑ. ]/g, "");
    // don't move cursor to end if no change
    if (clean !== $('#' + name).val()) $('#' + name).val(clean);
}
