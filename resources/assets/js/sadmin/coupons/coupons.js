listen('click', '.coupon-delete-btn', function (event) {
    let deleteCouponId = $(event.currentTarget).data('id')
    let url = route('coupon.destroy', { coupon: deleteCouponId })
    deleteItem(url, 'Coupon')
})

listen('click', '.is_status', function (event) {
    let couponId = $(this).data('id');
    $.ajax({
        url: route('coupon.updateStatus',couponId),
        method: 'get',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                Livewire.emit('refresh')
            }
        },
    });
})

