(function () {
    "use strict";
    /* declare global variables within the class */
    var uiTaxesTable,
        uiEditTaxForm,
        uiTaxesDatatable,
        uiInputNumeric,
        filler;

    /* private ajax function that will send request to backend */
    function _ajax(oParams, fnCallback, uiBtn) {
        if (platform.var_check(oParams)) {
            var oAjaxConfig = {
                "type": oParams.type,
                "data": oParams.data,
                "url": oParams.url,
                "token": platform.config('csrf.token'),
                "beforeSend": function () {
                    /* check if there is a button to add spinner */
                    if (platform.var_check(uiBtn)) {
                        platform.show_spinner(uiBtn, true);
                    }
                },
                "success": function (oData) {
                    console.log(oData);
                    if (typeof(fnCallback) == 'function') {
                        fnCallback(oData);
                    }
                },
                "complete": function () {
                    /* check if there is a button to remove spinner */
                    if (platform.var_check(uiBtn)) {
                        platform.show_spinner(uiBtn, false);
                    }
                }
            };

            platform.CentralAjax.ajax(oAjaxConfig);
        }
    }

    /* private fileselect function that will check/validate files input */
    function _fileselect(element, numFiles, label, ext) {
        var input = $(element).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        var uiImgContainer = $(element).parents('.form-group:first').find('.img-responsive');

        if (element.val() == '') {
            uiImgContainer.attr('src', uiImgContainer.attr('alt'));
            uiImgContainer.parents('.zoom:first').attr('href', uiImgContainer.attr('alt'));
            element.closest('.form-group').find('.remove-image-btn').hide();
            _fileselect_error(element, input, 'File is required.');
        } else {
            if (ext == 'jpeg' || ext == 'jpg' || ext == 'png') {
                element.closest('.form-group').find('.help-block').remove();
                element.closest('.form-group').removeClass('has-success has-error');
                element.closest('.form-group').find('.remove-image-btn').show();
                element.closest('.form-group').find('input.remove-image').val(0);

                if (input.length) {
                    input.val(log);
                    platform.readURL($(element).get(0).files[0], uiImgContainer, []);
                } else {
                    if (log) {
                        console.log(log);
                    }
                }
            }
            else {
                uiImgContainer.attr('src', uiImgContainer.attr('alt'));
                uiImgContainer.parents('.zoom:first').attr('href', uiImgContainer.attr('alt'));
                element.closest('.form-group').find('.remove-image-btn').hide();
                _fileselect_error(element, input, 'The upload file must be a file of type: jpeg, jpg, png.');
            }
        }

        element.closest('.form-group').find('.remove-image-btn').off('click').on('click', function () {
            uiImgContainer.attr('src', '');
            uiImgContainer.attr('alt', '');
            uiImgContainer.parents('.zoom:first').attr('href', uiImgContainer.attr('alt'));
            input.val('');
            element.val('');
            element.closest('.form-group').find('.remove-image-btn').hide();
            element.closest('.form-group').find('input.remove-image').val(1);
        });
    }

    /* private fileselect_error function that will append/display error messages of file input */
    function _fileselect_error(element, input, msg) {
        element.closest('.form-group').find('.help-block').remove();
        element.closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        element.parents('.form-group > div').append('<span id="file-error" class="help-block animation-slideDown">' + msg + '</span>');
        element.val('');
        input.val('');
    }

    /*
     * This js file will only contain tax events
     *
     * */
    CPlatform.prototype.tax = {

        initialize: function () {
            /* assign a value to the global variable within this class */
            uiTaxesTable = $('#taxes-table');
            uiEditTaxForm = $('#edit-tax');
            uiTaxesDatatable = null;
            uiInputNumeric = $('.input-numeric');

            uiTaxesDatatable = platform.tax.initialize_datatable();

            platform.input_numeric(uiInputNumeric);

            /* edit tax validation */
            uiEditTaxForm.find('[type="submit"]').on('click', function () {
                if (platform.var_check(CKEDITOR) && platform.var_check(CKEDITOR.instances)) {
                    for (var instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }
                }
            });
            uiEditTaxForm.validate({
                errorClass: 'help-block animation-slideDown',
                errorElement: 'span',
                errorPlacement: function (error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.form-group').find('.help-block').remove();
                },
                success: function (e) {
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.form-group').find('.help-block').remove();
                },
                submitHandler: function (form) {
                    platform.show_spinner($(form).find('[type="submit"]'), true);
                    form.submit();
                },
                rules: {
                    'tax': {
                        required: true
                    }
                },
                messages: {
                    'tax': {
                        required: 'Tax is required.'
                    }
                }
            });
        },

        initialize_datatable: function () {
            if (platform.var_check(uiTaxesDatatable)) {
                uiTaxesDatatable.destroy();
            }

            /* taxes table initialize datatable */
            uiTaxesDatatable = uiTaxesTable.DataTable({
                "searchDelay": 1000,
                "processing": true,
                "serverSide": true,
                "lengthChange": true,
                "ajax": {
                    "url": sAdminBaseURI + '/taxes/draw',
                    "dataType": "json",
                    "type": "GET",
                    "error": function(jqXHR, textStatus, errorThrown)
                    {
                        if (jqXHR.status != 0)
                        {
                            var message = 'Please try again.';
                            swal({
                                'title': "Error!",
                                'text': message,
                                'type': "error"
                            }, function () {

                            });
                        }
                    },
                    "complete": function () {

                    }
                },
                "columns": [
                    {
                        "data": "name",
                        "className": "text-left"
                    },
                    {
                        "data": "country",
                        "className": "text-left"
                    },
                    {
                        "data": "tax",
                        "className": "text-left"
                    },
                    {
                        "data": "action",
                        "className": "text-center"
                    }
                ],
                "order": [[0, "asc"]],
                "paging": true,
                "pageLength": 10,
                "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, 'All']],
                "ordering": true,
                "info": true,
                "searching": true,
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [3]
                }],
                "initComplete": function () {
                    /* create a container for additional filers */
                    $('.dataTables_filter').parents().first().after('<div class="filter-container width-100percent"></div>');
                    /*country filter*/
                    this.api().columns(1).every(function () {
                        var column = this;

                        /* create a select/input text/input range */
                        var sCountryFilter = 'custom_country_filter';
                        var uiCountrySelect = '<div class="col-sm-6"> ' +
                            '<div class="dataTables_custom_country_filter"> ' +
                            '<label><select ' +
                            'name="'+sCountryFilter+'" ' +
                            'aria-controls="'+sCountryFilter+'" class="form-control">' +
                            '<option value="">All</option> ';

                        for (var x in oCountries) {
                            var oCountry = oCountries[x];
                            uiCountrySelect += '<option value="' + oCountry.name + '">' + oCountry.name + '</option>';
                        }
                        // column.data().unique().sort().each(function (d, j) {
                        //     if (d != '') {
                        //         uiCountrySelect += '<option value="' + d + '">' + d + '</option>';
                        //     }
                        // });

                        uiCountrySelect += '</select></label></div></div>';

                        /* append to created container */
                        $('.filter-container').append(uiCountrySelect);

                        /* create an on change event for the filter */
                        $('[name="'+sCountryFilter+'"]').off('change').on('change', function () {
                            var val = $(this).val();
                            // column.search(val ? '^' + val + '$' : '', true, false).draw();
                            uiTaxesDatatable.columns(1).search(val).draw();
                        });
                    });
                    /*country filter end*/
                },
            });

            return uiTaxesDatatable;
        },
    }

}());

/* run initialize function on load of window */
$(window).on('load', function () {
    platform.tax.initialize();
});