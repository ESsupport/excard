@extends('layouts.app')
@section('title')
    {{__('messages.coupon')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column table-striped">
            @include('flash::message')
            <livewire:coupon-table/>
        </div>
    </div>
@endsection

