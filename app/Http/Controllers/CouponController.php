<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Search for a coupon
     * 
     * @param Request $request
     * 
     * @return Response
     */
    public function search(Request $request)
    {
        $coupon = Coupon::where('code',$request->get('coupon'))->first();

        if($coupon){
            $data['status'] = true;
            $data['coupon'] = $coupon;
            $data['message'] = 'The coupon is available';
        } else {
            $data['status'] = false;
            $data['message'] = "Invalid Coupon Code";
        }

        return response()->json($data,200);
    }
}
