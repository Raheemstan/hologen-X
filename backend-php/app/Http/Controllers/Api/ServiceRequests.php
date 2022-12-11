<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuthRequests;
use App\Models\ServiceApp;
use Illuminate\Http\Request;

class ServiceRequests extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function otprequest(Request $request)
    {
        $app = ServiceApp::find($request->api_key);
        $api_key = $request->api_key;


        if ($api_key == $app->api_key) {
            $otp = rand(000000, 999999);
            $otplog = new AuthRequests;
            $otplog->phone = $request->phone;
            $otplog->api_key = $request->api_key;
            $otplog->otp = $otp;
            $otplog->save();
            return response()->json([
                'status' => 200,
                'message' => 'request successful',
                'otp' => $otp,
                'phone' => +23490183232534,
            ]);
        } else {
            return response()->json([
                'status' => 409,
                'message' => 'invalid api key'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recieveSms(Request $request)
    {
        $twilSms = $request->Body;
        $twilPhone = $request->From;

        $auth_req = AuthRequests::where('otp', $twilSms)
            ->where('phone', $twilPhone)
            ->where('status', 1)
            ->update(['status' => 1]);

        if ($auth_req) {
            return response()->json([
                view('reply'),
                'status' => 200,
                'message' => 'SMS recieved',
            ]);
        } else {
            return response()->json([
                'status' => 409,
                'message' => 'Messaging error!'
            ]);
        }
    }
}
