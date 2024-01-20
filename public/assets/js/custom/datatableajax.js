var baseUrl = APP_URL + '/';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let commonFirstDataColumn = [
    { data: 'id', name: 'id' },
];
let commonLastDataColumn = [
    { data: 'status', name: 'status', sClass: 'w-50' },
    { data: 'action', name: 'action', sClass: 'w-50' }
];
let userDataColumn = [...commonFirstDataColumn, ...[
    { data: 'name', name: 'name', sClass: 'w-50' },
    { data: 'contact', name: 'contact', sClass: 'w-50' },
]
];
if (typeof userType !== 'undefined') {
    if (userType == 'driver') {
        userDataColumn = [...userDataColumn, ...[
            { data: 'licence_details', name: 'licence_details', sClass: 'w-50' },
            { data: 'address', name: 'address', sClass: 'w-50' },
            { data: 'availability', name: 'availability', sClass: 'w-50' },
        ]];
    }
    if (userType == 'corporate') {
        userDataColumn = [...userDataColumn, ...[
            { data: 'organization', name: 'organization', sClass: 'w-50' },
            { data: 'block', name: 'block', sClass: 'w-50' },
        ]];
    }
}
userDataColumn = [...userDataColumn, ...commonLastDataColumn];
let pageDataColumn = [
    ...commonFirstDataColumn, ...
    [
        { data: 'name', name: 'name', sClass: 'w-50' },
        { data: 'title', name: 'title', sClass: 'w-50' },
        { data: 'slug', name: 'slug', sClass: 'w-50' }
    ], ...commonLastDataColumn
];
let categoryDataColumn = [
    ...commonFirstDataColumn, ...
    [
        { data: 'picture', name: 'picture', sClass: 'w-50' },
        { data: 'name', name: 'name', sClass: 'w-50' }
    ], ...commonLastDataColumn
];
let zoneDataColumn = [
    ...commonFirstDataColumn, ...
    [
        { data: 'name', name: 'name', sClass: 'w-50' },
    ],
    ...commonLastDataColumn
];
let brandDataColumn = [
    ...commonFirstDataColumn, ...[
        { data: 'picture', name: 'picture', sClass: 'w-50' }],
    ...commonLastDataColumn
];
let roleDataColumn = [...commonFirstDataColumn, ...[
    { data: 'name', name: 'name', sClass: 'w-25' },
    { data: 'type', name: 'type', sClass: 'w-25' },
    { data: 'action', name: 'action', sClass: 'w-50' },
]
];
let permissionDataColumn = [...commonFirstDataColumn, ...[
    { data: 'name', name: 'name', sClass: 'w-25' },
    { data: 'action', name: 'action', sClass: 'w-50' },
]
];
let fareDataColumn = [
    ...commonFirstDataColumn, ...
    [
        { data: 'from', name: 'from', sClass: 'w-25' },
        { data: 'to', name: 'to', sClass: 'w-25' },
        { data: 'vehicle_type', name: 'vehicle_type', sClass: 'w-25' },
        { data: 'service_type', name: 'service_type', sClass: 'w-25' },
        { data: 'customer_type', name: 'customer_type', sClass: 'w-25' },
        { data: 'amount', name: 'amount', sClass: 'w-25' }
    ],
    ...commonLastDataColumn
];

let vehicleDataColumn = [
    ...commonFirstDataColumn, ...[
        { data: 'name', name: 'name', sClass: 'w-25' },
        { data: 'type', name: 'type', sClass: 'w-25' },
        { data: 'model', name: 'model', sClass: 'w-25' },
        { data: 'plate', name: 'plate', sClass: 'w-25' },
    ],
    ...commonLastDataColumn
];
let bookingDataColumn = [
    ...commonFirstDataColumn, ...[
        { data: 'service', name: 'service', sClass: 'w-25' },
        { data: 'user_type', name: 'user_type', sClass: 'w-25' },
        { data: 'date_time', name: 'date_time', sClass: 'w-25' },
        { data: 'location', name: 'location', sClass: 'w-25' },
    ],
    ...commonLastDataColumn
];
let RecoveryUserVehicleBookingDataColumn = [
    ...commonFirstDataColumn, ...[
        { data: 'service', name: 'service', sClass: 'w-25' },
        { data: 'user_type', name: 'user_type', sClass: 'w-25' },
        { data: 'date_time', name: 'date_time', sClass: 'w-25' },
        { data: 'location', name: 'location', sClass: 'w-25' },
    ],
    ...commonLastDataColumn
];
if (typeof userType !== 'undefined') {
    userType = userType == "customer" ? "user" : userType;
    let userTable = $('#userTable').DataTable({
        responsive: true,
        searching: false,
        lengthChange: false,
        "language": {
            "lengthMenu": "Counts per page_MENU_",
            searchPlaceholder: "Search By phone number , name, email,"
        },
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: baseUrl + 'ajax/getUsers/' + userType ?? '',
            dataType: "json",
            type: "get",
            data: function (d) {
                return $.extend({}, d, {
                    "name": $(".name").val() ?? '',
                    "email": $(".email").val() ?? '',
                    "mobile_number": $(".mobile_number").val() ?? ''
                });
            },
        },
        columns: userDataColumn,
        dom: '<".d-flex"<".col-6" l><".col-6 text-right" f >>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
        "ordering": true,
        "fnDrawCallback": function (oSettings) {
            let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
            oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
        },
        "createdRow": function (row, data, dataIndex) {
            $(row).addClass('manage-enable');
            if (data.is_active == true) {
                $(row).addClass('block-disable');
            }
        }
    });
}
let permissionTable = $('#permissionTable').DataTable({
    responsive: true,
    searching: true,
    lengthChange: true,
    "language": {
        "lengthMenu": "Counts per page_MENU_",
        searchPlaceholder: "Search By name"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getPermissions',
        dataType: "json",
        type: "get",
    },
    columns: permissionDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f >>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});
let roleTable = $('#rolesTable').DataTable({
    responsive: true,
    searching: true,
    lengthChange: true,
    "language": {
        "lengthMenu": "Counts per page_MENU_",
        searchPlaceholder: "Search By name"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getRoles',
        dataType: "json",
        type: "get",
    },
    columns: roleDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f >>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});
let pageTable = $('#pagesTable').DataTable({
    responsive: true,
    searching: true,
    lengthChange: true,
    "language": {
        lengthMenu: "Counts per page_MENU_",
        searchPlaceholder: "Search by name or title or slug"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getPages',
        dataType: "json",
        type: "get",

    },
    columns: pageDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f>>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});
let categoriesTable = $('#categoriesTable').DataTable({
    responsive: true,
    searching: false,
    lengthChange: false,
    "language": {
        lengthMenu: "Counts per page_MENU_",
        searchPlaceholder: "Search by name"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getCategories',
        dataType: "json",
        type: "get",
        data: function (d) {
            return $.extend({}, d, {
                "name": $(".name").val() ?? '',
                "type": type
            });
        },

    },
    columns: categoryDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f>>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});
let zoneTable = $('#zoneTable').DataTable({
    responsive: true,
    searching: false,
    lengthChange: false,
    "language": {
        lengthMenu: "Counts per page_MENU_",
        searchPlaceholder: "Search by name"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getZones',
        dataType: "json",
        type: "get",
        data: function (d) {
            return $.extend({}, d, {
                "name": $(".name").val() ?? ''
            });
        },

    },
    columns: zoneDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f>>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});

let zoneFareTable = $('#zoneFareTable').DataTable({
    responsive: true,
    searching: false,
    lengthChange: false,
    "language": {
        lengthMenu: "Counts per page_MENU_",
        searchPlaceholder: "Search by name"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getZoneFares' + (typeof (zoneUuid) !== 'undefined' ? '/' + zoneUuid : ''),
        dataType: "json",
        type: "get",
        data: function (d) {
            return $.extend({}, d, {
                "from_zone": $(".from_zone").val() ?? '',
                "to_zone": $(".to_zone").val() ?? '',
                "user_type": $(".user_type").val() ?? '',
                "vehicle_type": $(".vehicle_type").val() ?? '',
                "service_type": $(".service_type").val() ?? ''
            });
        },

    },
    columns: fareDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f>>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});


let vehicleTable = $('#vehicleTable').DataTable({
    responsive: true,
    searching: false,
    lengthChange: true,
    "language": {
        lengthMenu: "Counts per page_MENU_",
        searchPlaceholder: "Search by name"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getVehicles',
        dataType: "json",
        type: "get",

    },
    columns: vehicleDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f>>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});

let bookingTable = $('#bookingTable').DataTable({
    responsive: true,
    searching: false,
    lengthChange: true,
    "language": {
        lengthMenu: "Counts per page_MENU_",
        searchPlaceholder: "Search by name"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getBookings',
        dataType: "json",
        type: "get",
    },
    columns: bookingDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f>>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});


let RecoveryUserVehicleBookingTable = $('#RecoveryUserVehicleBookingTable').DataTable({
    responsive: true,
    searching: false,
    lengthChange: true,
    "language": {
        lengthMenu: "Counts per page_MENU_",
        searchPlaceholder: "Search by name"
    },
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: {
        url: baseUrl + 'ajax/getRecoveryUserVehicleBooking',
        dataType: "json",
        type: "get",
        data: function (d) {
            return $.extend({}, d, {
                "type": 'towing-services'
            });
        },
    },
    columns: RecoveryUserVehicleBookingDataColumn,
    dom: '<".d-flex"<".col-6" l><".col-6 text-right" f>>t<".d-flex"<".col-6" i><".col-6 text-right"p>>',
    "ordering": true,
    "fnDrawCallback": function (oSettings) {
        let pagination = $(oSettings.nTableWrapper).find('.dataTables_paginate,.dataTables_info,.dataTables_length');
        oSettings._iDisplayLength > oSettings.fnRecordsDisplay() ? pagination.hide() : pagination.show();
    },
    "createdRow": function (row, data, dataIndex) {
        $(row).addClass('manage-enable');
        if (data.is_active == true) {
            $(row).addClass('block-disable');
        }
    }
});

$(document).ready(function () {
    $('.dataTables_filter input[type="search"]').css({
        'width': '400px',
        'display': 'inline-block',
        'margin': '24px -12px 6px 10px',
    });
    $('.loaddata').change(function () {
        change = $(this).find(":selected").val();
        if (change) {
            if ($(this).hasClass('statusDropdown')) {
                userTable.ajax.reload();
            }
        }
    });
    $('.search').on('click', function (e) {
        let table = $(this).data('reload');
        console.log(table);
        $('#' + table).DataTable().ajax.reload();
    });
})




