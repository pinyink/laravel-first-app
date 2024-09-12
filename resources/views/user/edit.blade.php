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
                    <li class="breadcrumb-item text-muted">{{ __('Update') }}</li>
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
                    <h3 class="fw-bold m-0">{{ __('Update User') }}</h3>
                </div>
                
            </div>
            <div class="card-body">
                @include('user._form', ['button' => 'Update', 'method' => 'update', 'id' => $user->id])
            </div>
        </div>
    </x-slot:content>
    
</x-admin-layout>