@extends('layouts.admin.master', ['page' => __('custom.paltforms'), 'pageSlug' => 'platforms'])
@push('css')
    <link rel="stylesheet" href="{{ asset('black/css/jquery.dataTables.min.css') }}">

    <style>
        .avatar-picture {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .avatar-picture .image-input {
            position: relative;
            display: inline-block;
            border-radius: 50%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .avatar-picture .image-input .image-input-wrapper {
            border: 3px solid #fff;
            background-image: url("");
            width: 150px;
            height: 150px;
            /* border-radius: 50%; */
            background-repeat: no-repeat;
            background-size: contain !important;
        }

        .avatar-picture .image-input .btn {
            height: 24px;
            width: 24px;
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            left: 3px;
            bottom: -9px;
            background-color: #FFFFFF;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 0;
            -webkit-filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.16));
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.16));
        }

        .avatar-picture .image-input .btn img {
            position: relative;
            top: -2px;
        }

        .avatar-picture .image-input .btn:hover {
            background-color: var(--main-color);
        }

        .avatar-picture .image-input .btn:hover img {
            -webkit-filter: invert(1) brightness(10);
            filter: invert(1) brightness(10);
        }

        .avatar-picture .image-input .btn input {
            width: 0 !important;
            height: 0 !important;
            overflow: hidden;
            opacity: 0;
            display: none;
        }

        th,
        td {
            font-size: 14px !important;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card  card-plain">
                <div class="card-header">
                    <h4 class="card-title">{{ __('custom.sidebar.platforms') }}</h4>
                    <p class="category"><button class="btn btn-outline-info" data-toggle="modal"
                            data-target="#platform-create-update-modal" data-action="{{ route('admin.platform.store') }}"
                            data-method="POST" data-is-create="1"><i class="fa fa-plus"></i></button></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="myTable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        {{ __('custom.logo') }}
                                    </th>
                                    <th>
                                        {{ __('custom.name') }}
                                    </th>
                                    <th>
                                        {{ __('custom.created_at') }}
                                    </th>
                                    <th>
                                        {{ __('custom.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.platform.modal')

@push('js')
    <script src="{{ asset('black/js/jquery.dataTables.min.js') }}"></script>

    <script>
        // change image and preveiw
        $('#uploadButton_1').on('click', function() {
            $('#changeImg_1').click();
        })

        var file_1 = null,
            reader_1 = null;
        $('#changeImg_1').change(function() {
            file_1 = this.files[0];
            reader_1 = new FileReader();
            reader_1.onloadend = function() {
                $('#image-input-wrapper-1').css('background-image', 'url("' + reader_1.result + '")');
            }
            if (file_1) {
                reader_1.readAsDataURL(file_1);
            }
        });
    </script>

    <script>
        var table_data_url = "{{ $table_data_url }}";
        $(document).ready(function() {

            // render The datatable if we are at a table page
            if (table_data_url !== 'undefined') {
                renderDataTable();
            }

        });

        /**
         * render Datatable
         */
        function renderDataTable() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                order: [[2 , 'desc']],
                ajax: table_data_url,
                columns: getTableColumns(),
            });
        }

        function getTableColumns() {
            return [{
                    data: 'logo',
                    name: 'logo',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'name',
                    name: 'name',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: true,
                    orderable: true,
                },

                {
                    data: 'actions',
                    name: 'actions',
                    searchable: false,
                    orderable: false,
                },
            ];
        }

        /**
         * Project Info modal
         */

        $('#platform-create-update-modal').on('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            var action = btn.getAttribute('data-action');
            var method = btn.getAttribute('data-method');
            var isCreate = btn.getAttribute('data-is-create');
            var bolAccount = btn.getAttribute('data-platform');
            if (bolAccount != null) {
                bolAccount = JSON.parse(bolAccount);
            }
            var logo = btn.getAttribute('data-logo');
            $(this).find('form').attr('action', action);
            $(this).find('form').attr('method', method);
            if (isCreate == 1) {
                $(this).find('button[type="reset"]').click();
            } else {
                document.getElementById('image-input-wrapper-1').style.backgroundImage = "url(" + logo + ")";
                $('#name').val(bolAccount.name);
            }

        });
    </script>
@endpush
