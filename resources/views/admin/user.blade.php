<x-admin-layout>
    <x-slot:breadcrumb>
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{ __('User')}}
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{ __('Dashboard')}}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">{{ __('User') }}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
    </x-slot:breadcrumb>

    <x-slot:content>
        <div class="card mt-3">
            <div class="card-header">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">{{ __('Data User') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <table id="tbl_list" class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </x-slot:content>
    
@push('scripts')
    <script type="text/javascript">
    $(document).ready(function () {
    $('#tbl_list').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: '{{ route('admin.user_list') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'button', orderable: false, searchable: false},
            ]
        });
    });
    </script>
@endpush
</x-admin-layout>