@extends('layouts.admin.master', ['page' => __('custom.paltforms'), 'pageSlug' => 'platforms'])
@push('css')
    <link rel="stylesheet" href="{{ asset('black/css/jquery.dataTables.min.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card  card-plain">
                <div class="card-header">
                    <h4 class="card-title">{{ __('custom.sidebar.services') }}</h4>
                    <p class="category"><button class="btn btn-outline-info" data-toggle="modal"
                            data-target="#service-create-update-modal" data-action="{{ route('admin.service.store') }}"
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
                                        {{ __('custom.status') }}
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
@include('admin.service.modal')

@push('js')
    <script src="{{ asset('black/js/jquery.dataTables.min.js') }}"></script>


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
                order: [[3 , 'desc']],
                ajax: table_data_url,
                columns: getTableColumns(),
            });
        }

        function getTableColumns() {
            return [{
                    data: 'platform_logo',
                    name: 'platform_logo',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'is_published',
                    name: 'is_published',
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

        $('#service-create-update-modal').on('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            var action = btn.getAttribute('data-action');
            var method = btn.getAttribute('data-method');
            var isCreate = btn.getAttribute('data-is-create');
            var service = btn.getAttribute('data-service');
            var service_features = [];
            if (service != null) {
                service = JSON.parse(service);
                service_features = JSON.parse(service.features);
            }
            $(this).find('form').attr('action', action);
            $(this).find('form').attr('method', method);
            $('.removeable').remove();
            if (isCreate == 1) {
                $(this).find('button[type="reset"]').click();
            } else {
                $('#name').val(service.name);
                $('#is_published').val(service.is_published);
                $('#platform_id').val(service.platform_id);
                $('#offer_url').val(service.offer_url);
                if (service_features.length > 0) {
                    var html = ``;
                    $.each(service_features, function(key, value) {
                        html += `<div class="col-sm-12 removeable">
                        <div class="form-group d-flex">
                            ✔️ &nbsp; &nbsp;
                            <input type="text" name="features[]" value="${value}" class="form-control d-flex"> &nbsp;
                            <button type="button" class="add_feature btn-xs btn-primary" onclick="addNewFeature($(this));"><i
                                    class="fa fa-plus"></i></button>&nbsp;
                            <button type="button" class="remove_feature btn-xs btn-danger" onclick="deleteFeature($(this));"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>`;
                    });
                    $('#features-btn').after(html);
                }
            }
        });
    </script>

    {{-- start  features script --}}
    <script>
        function addNewFeature(btn) {
            var html = `<div class="col-sm-12">
                        <div class="form-group d-flex">
                            ✔️ &nbsp; &nbsp;
                            <input type="text" name="features[]" class="form-control d-flex"> &nbsp;
                            <button type="button" class="add_feature btn-xs btn-primary" onclick="addNewFeature($(this));"><i
                                    class="fa fa-plus"></i></button>&nbsp;
                            <button type="button" class="remove_feature btn-xs btn-danger" onclick="deleteFeature($(this));"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>`;
            btn.parent().parent().after(html);
        };

        function deleteFeature(btn) {
            btn.parent().parent().remove();
        };
    </script>
    {{-- end  features script --}}
@endpush
