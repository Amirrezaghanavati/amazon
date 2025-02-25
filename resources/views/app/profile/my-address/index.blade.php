@extends('app.layouts.app')

@section('title', 'آدرس های من')

@section('content')
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">

                @include('app.profile.partials.sidebar')

                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>آدرس های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route('profile.my-address.create') }}" class="btn btn-primary text-white btn-sm">آدرس جدید</a>
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->

                        @if($addresses->isEmpty())
                            <div class="alert alert-info text-center">هیچ آدرسی ثبت نشده است</div>
                        @else
                            <section class="address-list">
                                @foreach($addresses as $address)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p class="mb-1">
                                                        <strong>شهر:</strong> {{ $address->city->name }}
                                                    </p>
                                                    <p class="mb-1">
                                                        <strong>کد پستی:</strong> {{ $address->postal_code }}
                                                    </p>
                                                    <p class="mb-1">
                                                        <strong>آدرس دقیق:</strong> {{ $address->address }}
                                                    </p>
                                                    <p class="mb-0">
                                                        <strong>واحد:</strong> {{ $address->unit ?? '-' }}
                                                    </p>
                                                    <p class="mb-0">
                                                        <strong>پلاک:</strong> {{ $address->no ?? '-' }}
                                                    </p>
                                                </div>
                                                <div class="col-md-4 text-end">
                                                    <a href="{{ route('profile.my-address.edit', $address) }}"
                                                       class="btn btn-sm btn-warning">ویرایش</a>
                                                    <form action="{{ route('profile.my-address.destroy', $address) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-sm btn-danger delete"
                                                                >حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </section>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('profile.my-address.create') }}"
                               class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                افزودن آدرس جدید
                            </a>
                        </div>

                    </section>
                </main>
            </section>
        </section>
    </section>
@endsection

@section('scripts')
    @parent

    @include('admin.alerts.sweetalert.success')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
