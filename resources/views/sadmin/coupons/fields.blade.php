<div class="row">
    <div class="col-lg-6 mb-7">
        {{ Form::label('name', __('messages.common.name').':', ['class' => 'form-label required']) }}
        {{ Form::text('name', isset($coupon) ? $coupon->name : null, ['class' => 'form-control', 'placeholder' => __('messages.coupons.coupon_name'), 'required']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {{ Form::label('code', __('messages.coupons.code').':',['class' => 'form-label required']) }}
        {{ Form::text('code', isset($coupon) ? $coupon->code : $code  , ['class' => 'form-control', 'placeholder' => __('messages.coupons.coupon_code'), 'required','readonly']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {{ Form::label('percentage', __('messages.coupons.percentage').':',['class' => 'form-label required']) }}
        {{ Form::text('percentage',isset($coupon) ? $coupon->percentage : null, ['class' => 'form-control', 'required','min'=>'1','placeholder' => __('messages.coupons.coupon_percentage'), 'required']) }}
    </div>
    <div class="col-lg-6 mb-7">
        {!! Form::label('use_type', __('messages.coupons.use_count').':',['class' => 'form-label required']) !!}
        {!! Form::text('use_type',isset($coupon) ? $coupon->use_type : null, ['class' => 'form-control price-format-input', 'min'=>'1', 'placeholder' => __('messages.coupons.coupon_use_count'), 'required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
    </div>
    <div class="col-lg-6 mb-7">
        {!! Form::label('status', __('messages.common.status').':',['class' => 'form-label']) !!}
        <label class="form-check form-switch form-check-solid form-switch-sm d-flex cursor-pointer">
            <input type="checkbox" name="status" class="form-check-input" {{isset($coupon->status) && $coupon->status == 1 ? 'checked' : null}}>
            <span class="custom-switch-indicator"></span>
        </label>
    </div>
    <div>
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3','id' => 'couponsFormSubmit']) }}
        <a href="{{ route('coupon.index') }}" class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>
