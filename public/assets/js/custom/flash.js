'use strict';
var baseUrl = APP_URL + '/';
var flashstatus = $('span.flashstatus').text();
var flashmessage = $('span.flashmessage').text();
if (flashstatus == 'SUCCESS') {
    $.toast({
        heading: 'Success',
        text: flashmessage,
        loader: true,
        icon: 'success',
        position: TOAST_POSITION
    });
}
if (flashstatus == 'ERROR') {
    $.toast({
        heading: 'Error',
        text: flashmessage,
        loader: true,
        icon: 'error',
        position: TOAST_POSITION
    })
}

if (flashstatus == 'INFORMATION') {
    $.toast({
        heading: 'Information',
        text: flashmessage,
        loader: true,
        icon: 'info',
        position: TOAST_POSITION
    })
}

if (flashstatus == 'WARNING') {
    $.toast({
        heading: 'Warning',
        text: flashmessage,
        loader: true,
        icon: 'warning',
        position: TOAST_POSITION
    })
}

function showToast(type, title, message) {
    $.toast({
        heading: title,
        text: message,
        loader: true,
        icon: type,
        position: TOAST_POSITION,
    });
}

