<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use App\Repositories\CouponRepository;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Nette\Utils\Random;

class CouponController extends AppBaseController
{
    /**
     * @var CouponRepository
     */
    private $couponRepository;
    /**
     * PlanController constructor.
     * @param  CouponRepository  $couponRepository
     */
    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sadmin.coupons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = Str::random(10);
        
        return view('sadmin.coupons.create', compact('code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCouponRequest $request)
    {
        $input = $request->all();

        $this->couponRepository->store($input);

        Flash::success(__('messages.coupons.coupon_create'));

        return redirect(route('coupon.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('sadmin.coupons.edit', compact('coupon'));
    }
    
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $input = $request->all();
        
        $this->couponRepository->update($input, $coupon->id);

        Flash::success(__('messages.coupons.coupon_update'));

        return redirect(route('coupon.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return $this->sendSuccess('Coupon deleted successfully.');
    }
    
    public function updateStatus(Coupon $coupon){
        $coupon->update([
            'status' => !$coupon->status,
        ]);

        return $this->sendSuccess(__('messages.coupons.coupon_status'));
    }
    
    public function couponCheck(Request $request){
        $input = $request->all();
      
        $coupon = Coupon::where('code', $input['code'])->where('status', 1)->first();
        
        if(!empty($coupon)){
            $amount = $input['pay_amount'];     
            $discount_per = $coupon->percentage;

            $final_amount = $amount - ($amount * ($discount_per / 100));
            return $this->sendResponse($final_amount, __('Coupon code Discount Applied'));
        }

        return $this->sendError(__('Invalid coupon Coupon code'));
        
           
    
        
    }
}
