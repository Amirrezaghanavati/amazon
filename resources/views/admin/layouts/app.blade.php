<!DOCTYPE html>
<html lang="fa">

<head>
    @include('admin.layouts.head-tag')
</head>

<body dir="rtl">


@include('admin.layouts.partials.header')

<section class="body-container bg-dark">

    @include('admin.layouts.partials.sidebar')


    <section id="main-body" class="main-body">

        @yield('content')

    </section>
</section>

@include('admin.layouts.scripts')

<section class="toast-wrapper flex-row-reverse">
    @include('admin.alerts.toast.success')
    @include('admin.alerts.toast.error')
</section>
@include('admin.alerts.sweetalert.error')
@include('admin.alerts.sweetalert.success')
@include('admin.alerts.sweetalert.delete-confirm')
</body>

</html>
