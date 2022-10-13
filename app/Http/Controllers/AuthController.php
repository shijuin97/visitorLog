<?php

namespace App\Http\Controllers;

use App\Customers;
use App\PurchaseTransaction;
use App\Vouchers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function checkCustomerEligible(Request $request)
    {
        $customer = Customers::select('id', 'email')->where('email', $request->email)->first();
        if ($customer !== NULL) {
            $purchase_transactions = PurchaseTransaction::where('customer_id', $customer->id)->get();

            if (count($purchase_transactions) > 0) {
                $complete = 0;
                $total_transaction = 0;
                foreach ($purchase_transactions as $purchase_transaction) :
                    if (strtotime($purchase_transaction->transaction_at) > strtotime('-30 days')) {
                        $complete = $complete + 1;
                        $total_transaction = $total_transaction + $purchase_transaction->total_spent;
                    }
                endforeach;

                $existsVoucher = Vouchers::where('customer_id', $customer->id)->exists();
                if ($complete > 2 && $total_transaction >= 100 && $existsVoucher === false) {
                    $voucher = Vouchers::where('isAssigned', 0)->where('isTemporary', 0)->first();

                    if ($voucher !== NULL) {
                        $voucher->customer_id = $customer->id;
                        $voucher->isTemporary = true;
                        $voucher->save();
                        return response()->json($customer);
                    } else {
                        return response()->json([
                            'error' => 'Voucher out of stock!'
                        ], 400);
                    }
                } else {
                    return response()->json([
                        'error' => 'You are not eligible!'
                    ], 400);
                }
            } else {
                return response()->json([
                    'error' => 'You are not eligible!'
                ], 400);
            }
        } else {
            return response()->json([
                'error' => 'You are not eligible!'
            ], 400);
        }
    }

    public function validatePhotoSubmission(Request $request)
    {

        $voucher = Vouchers::where('customer_id', $request->customer_id)->first();
        if ($request->qualify === 'true' && $request->file('url')) {
            $voucher->isAssigned = true;
            $voucher->save();
            return response()->json($voucher->voucher_code);
        } else {

            $voucher->customer_id = NULL;
            $voucher->isTemporary = false;
            $voucher->save();

            return response()->json([
                'error' => 'Sorry, You are not eligible to claim voucher'
            ], 400);
        }
    }
}
