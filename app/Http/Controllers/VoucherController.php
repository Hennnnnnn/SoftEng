<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    //

    public function showMyVoucher() {

        $list = [
            [

            ],
            [

            ]
        ];

        return view('pages.voucher.myVoucher', compact('list'));
    }

    public function showVoucherList() {

        $list = [
            [

            ],
            [

            ]
        ];

        return view('pages.voucher.myVoucher', compact('list'));
    }
}
