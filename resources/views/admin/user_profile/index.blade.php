@extends('layouts.admin.master', ['page' => __('custom.paltforms'), 'pageSlug' => 'platforms'])
@push('css')
    <link rel="stylesheet" href="{{ asset('black/css/jquery.dataTables.min.css') }}">
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
                                        {{ __('custom.profile') }}
                                    </th>
                                    <th>
                                        {{ __('custom.platform') }}
                                    </th>
                                    <th>
                                        {{ __('custom.service') }}
                                    </th>
                                    <th>
                                        {{ __('custom.created_at') }}
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
                order: [
                    [3, 'desc']
                ],
                ajax: table_data_url,
                columns: getTableColumns(),
            });
        }

        function getTableColumns() {
            return [{
                    data: 'url',
                    name: 'url',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'platform',
                    name: 'service.platform.name',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'service',
                    name: 'service.name',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: true,
                    orderable: true,
                },
            ];
        }
    </script>
@endpush
