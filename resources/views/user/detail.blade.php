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
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route("admin.user") }}"><span class="text-muted text-hover-primary">{{ __('User') }}</span></a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">{{ __('detail') }}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
    </x-slot:breadcrumb>

    <x-slot:content>
        @if (session('status') === 'success')
            <div class="alert alert-success">
                {{ __('Saved.') }}
            </div>
        @endif
        <div class="card mt-3">
            <div class="card-header">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">{{ __('Detail User') }}</h3>
                </div>
                
            </div>
            <div class="card-body">
                @include('user._detail')
            </div>
            <div class="card-footer d-flex">
                <a class="btn btn-primary btn-sm" href="{{ route('admin.user.edit', ['id' => $user->id]) }}">{{ __('Edit') }}</a>
                <form method="post" action="{{ route('admin.user.delete') }}" id="formDelete">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 5px;">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>
    </x-slot:content>
    
    @push('scripts')
    <script>
        $('#formDelete').submit(function (e) { 
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.user.delete') }}",
                        data: $('#formDelete').serialize(),
                        dataType: "JSON",
                        success: function (response) {
                            swal({
                                title: "Notification !",
                                text: response.message,
                                icon: response.info
                            }).then(function (e) {
                                window.location.href = "{{ route('admin.user') }}";
                            });
                        }
                    });
                    
                } 
            });
        });
    </script>
    @endpush
</x-admin-layout>