$(document).on('change', '.select_country', function () {
    let country = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: APP_URL + '/admin/doctor/state-by-country',
        data: {
            'id': country
        },
        success: function (response) {
            var statehtml = '';
            if (response.status == true) {
                response.data.forEach(element => {
                    statehtml += `<option value="`+element.id+`">`+element.name+`</option>`;
                })
                $('.select_state').html(statehtml);
            } else {
                $('.select_state').html(`<option value="">---Select---</option>`);
            }
        },
        error: function (errorResponse) {
            $('.select_state').html(`<option value="">---Select---</option>`);
        }
    })
});

$(document).on('change', '.select_state', function () {
    let state = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: APP_URL + '/admin/doctor/city-by-state',
        data: {
            'id': state
        },
        success: function (response) {
            var cityhtml = '';
            if (response.status == true) {
                response.data.forEach(element => {
                    cityhtml += `<option value="`+element.id+`">`+element.name+`</option>`;
                })
                $('.select_city').html(cityhtml);
            } else {
                $('.select_city').html(`<option value="">---Select---</option>`);
            }
        },
        error: function (errorResponse) {
            $('.select_city').html(`<option value="">---Select---</option>`);
        }
    })
});

