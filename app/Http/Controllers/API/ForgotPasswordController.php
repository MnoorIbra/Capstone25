<?php

namespace App\Http\Controllers\API;

use App\helpers\ApiFormatter;
use App\Models\ResetCodePassword;
use App\Mail\SendCodeResetPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    /**
     * Send random code to email of user to reset password (Step 1)
     *
     * @param  ForgotPasswordRequest  $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $data = $request->all(); // Use validated() method for validation

        ResetCodePassword::where('email', $request->email)->delete();

        $data['code'] = mt_rand(100000, 999999);

        $codeData = ResetCodePassword::create($data);

        Mail::to($request->email)->send(new SendCodeResetPassword($codeData->code));

        return ApiFormatter::createApi(200, 'Password reset code sent');
    }
}