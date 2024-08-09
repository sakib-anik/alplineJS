@extends('user_backend.layouts.app')
@section('title','Template')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/dracula.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/simplemde/simplemde.min.css') }}">

    <style>
        .CodeMirror {
            font-size: 13px; /* Adjust this value to your desired font size */
        }
    </style>
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Template</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text text-blue">Somahat</li>
                        <li class="breadcrumb-item active">Hotspot</li>
                        <li class="breadcrumb-item active">Voucher</li>
                        <li class="breadcrumb-item active">Template</li>
                        <li class="breadcrumb-item active">Create</li>
                        <!--[if ENDBLOCK]><![endif]-->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content" style="height: auto !important;">
        <div class="container-fluid" style="height: auto !important;">

            <div class="row">
                <div class="col-12 col-lg-8">
                    <form method="POST" action="{{ route('user.voucher.ticket.template.store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Create Voucher Template
                                </h3>
                            </div>
                            <div wire:ignore="" class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Template Name</label>
                                            <input type="text" id="templateName" class="form-control"
                                                   placeholder="Enter Template Name" name="name">
                                        </div>
                                        <div class="form-group" wire:ignore="">
                                            <label>Style (CSS):</label>
                                            <textarea id="css_code" name="cssEditor">{{
                                                "body {
    color: #000000;
    background-color: #FFFFFF;
    font-size: 14px;
    font-family: 'Helvetica', arial, sans-serif;
    margin: 0px;
    -webkit-print-color-adjust: exact;
}

table.voucher {
    display: inline-block;
    border: 2px solid black;
    margin: 2px;
}

@page {
    size: auto;
    margin-left: 7mm;
    margin-right: 3mm;
    margin-top: 9mm;
    margin-bottom: 3mm;
}

@media print {
    table {
        page-break-after: auto
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto
    }

    td {
        page-break-inside: avoid;
        page-break-after: auto
    }

    thead {
        display: table-header-group
    }

    tfoot {
        display: table-footer-group
    }
}

#num {
    float: right;
    display: inline-block;
}

.qrc {
    width: 30px;
    height: 30px;
    margin-top: 1px;
}"
}}
                                            </textarea>
                                        </div>
                                        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                        <div class="form-group" wire:ignore="">
                                            <label>Template (HTML):</label>
                                            <textarea id="html_code" name="htmlEditor" >{{ '<table class="voucher" style=" width: 160px;">
    <tbody>
        <tr style="background-color: black;">
            <td style="text-align: left; font-size: 14px; font-weight:bold;color: white;">
                <span x-text="voucher.profile"></span><span x-text="voucher.id" id="num"></span>
            </td>
        </tr>
        <tr>
            <td>
                <table style=" text-align: center; width: 150px;">
                    <tbody>
                        <tr style="color: black; font-size: 11px;">
                            <td>
                                <table style="width:100%;">
                                    <tr>
                                        <td>VOUCHER CODE</td>
                                    </tr>
                                    <tr style="color: black; font-size: 14px;">
                                        <td style="width:100%; border: 1px solid black; font-weight:bold;">
                                            <span x-text="voucher.code"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"
                                            style="border: 1px solid black; font-weight:bold;">
                                            Price <span x-text="voucher.price"></span></td>
                                    </tr>
                                    <tr x-show="voucher.time_limit">
                                        <td colspan="2"
                                            style="border: 1px solid black; font-weight:bold;">
                                            Time Limit: <span x-text="voucher.time_limit"></span>
                                        </td>
                                    </tr>
                                    <tr x-show="voucher.validity">
                                        <td colspan="2"
                                            style="border: 1px solid black; font-weight:bold;">
                                            Validity: <span x-text="voucher.validity"></span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create
                                    Template</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h3 class="card-title">Parameters</h3>
                        </div>
                        <div class="card-body text-md">
                            <ul>
                                <li>
                                    <span class="text text-info">"voucher.id"</span>
                                    <ul>
                                        <li class="text-xs">
                                            Unique ID of Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.reseller_name"</span>
                                    <ul>
                                        <li class="text-xs">
                                            Name of Reseller asign to this Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.reseller_id"</span>
                                    <ul>
                                        <li class="text-xs">
                                            Id of Reseller asign to this Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.batch_id"</span>
                                    <ul>
                                        <li class="text-xs">
                                            BatchID of Vouchers (base on Timestamp)
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.code"</span>
                                    <ul>
                                        <li class="text-xs">
                                            The CODE / Username of Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.profile"</span>
                                    <ul>
                                        <li class="text-xs">
                                            The name of Hotspot Profile
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.price"</span>
                                    <ul>
                                        <li class="text-xs">
                                            The Price of Hotspot Profile
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.time_limit"</span>
                                    <ul>
                                        <li class="text-xs">
                                            The Time Limit of Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.data_limit"</span>
                                    <ul>
                                        <li class="text-xs">
                                            The Data Limit of Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.speed_max_download"</span>
                                    <ul>
                                        <li class="text-xs">
                                            The download speed of Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.speed_max_upload"</span>
                                    <ul>
                                        <li class="text-xs">
                                            The upload speed of Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"voucher.validity"</span>
                                    <ul>
                                        <li class="text-xs">
                                            The expiration / validity of Voucher
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <span class="text text-info">"logo"</span>
                                    <ul>
                                        <li class="text-xs">
                                            URL of your Logo
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="card-footer">
                    <span class="text text-xs">
                        <b>Note:</b> It Uses AlpineJS Library
                    </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/css/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/addon/edit/matchbrackets.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var cssEditor = CodeMirror.fromTextArea(document.getElementById("css_code"), {
                lineNumbers: true,
                mode: "css",
                theme: "dracula",
                matchBrackets: true
            });

            var htmlEditor = CodeMirror.fromTextArea(document.getElementById("html_code"), {
                lineNumbers: true,
                mode: "htmlmixed",
                theme: "dracula",
                matchBrackets: true
            });

            document.getElementById('voucherForm').addEventListener('submit', function(e) {
                var nameField = document.getElementById('name').value;
                if (nameField.trim() === '') {
                    e.preventDefault();
                    console.log('kaka');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Template Name is required!'
                    });
                }
            });
        });
    </script>
    <script>

        $(function () {
            // Summernote
            $('#summernote').summernote()


        })



        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });





    </script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteRoute(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-2',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#example thead tr')
                .clone(true)
                .addClass('filters')
            // .appendTo('#example thead');

            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function () {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function (colIdx) {
                            // Set the header cell to contain the input element
                            // var cell = $('.filters th').eq(
                            //     $(api.column(colIdx).header()).index()
                            // );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');

                            // On every keypress in this input
                            $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                                .off('keyup change')
                                .on('keyup change', function (e) {
                                    e.stopPropagation();

                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != ''
                                                ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                : '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();

                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });

    </script>
    <script>
        function validateEmail(emailId)
        {
            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if(emailId.value.match(mailformat))
            {
                document.form1.text1.focus();
                return true;
            }
            else
            {
                alert("Invalid email address.");
                document.form1.text1.focus();
                return false;
            }
        }
    </script>
    <script>
        var selectedBatch;

        // $('#table_show_vouchers, #table_show').DataTable({
        //     "paging": false,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": false,
        //     "info": false,
        //     "autoWidth": false,
        //     "responsive": true,
        // });

        function showVoucherTemplate(batch) {
            selectedBatch = batch;
            $('#print-voucher-form').modal('show');
        }

        function printBatchNow() {
            const voucherTemplate = $('#print_template').val();
            window.open('https://waspradi.us/api/vouchers/print?batch=' + selectedBatch + '&template=' + voucherTemplate);
        }
    </script>

@endpush


