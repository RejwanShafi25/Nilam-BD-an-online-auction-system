<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\AuctionItem;
use App\Models\BidRecord;
use App\Models\User;

class PaymentApprovalController extends Controller
{
    public function index()
    {
        // Fetch all payments with status pending
        $payments = Payment::where('status', 'pending')->with('auctionItem', 'user')->get();

        return view('admin.payment-approval', compact('payments'));
    }

    public function approve($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'approved';
        $payment->save();

        return redirect()->back()->with('success', 'Payment approved successfully.');
    }

    public function reject($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'rejected';
        $payment->save();

        return redirect()->back()->with('success', 'Payment rejected.');
    }
}
