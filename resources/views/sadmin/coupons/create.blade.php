@extends('layouts.app')
@section('title')
    {{__('messages.common.new_coupon')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">{{__('messages.common.new_coupon')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-outline-primary float-end"
                   href="{{ route('coupon.index') }}">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                @include('layouts.errors')
            </div>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'coupon.store', 'method' => 'post']) !!}
                    @include('sadmin.coupons.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
