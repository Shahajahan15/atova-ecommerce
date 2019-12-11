<?php

namespace Modules\Statistics\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Invest\Entities\Withdraw;
use Modules\Statistics\Entities\BankWithdraw;
use Modules\Statistics\Entities\Deposit;
use Modules\Statistics\Entities\Expense;
use Modules\Statistics\Entities\Invest;
use Modules\Statistics\Entities\Invoice;
use Modules\Statistics\Entities\Payment;
use Modules\Statistics\Entities\Product;
use Modules\Statistics\Entities\Receipt;

class DashboardController extends StatisticsAdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['info']->menu       = 'Dashboard';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->data['cashInHand']   = $this->cashInHand();
        $this->data['cashInBank']   = $this->cashInBank();
        $this->data['invest']       = $this->invest();
        $this->data['expense']      = number_format(Expense::sum('amount'));
        $this->data['products']     = Product::orderBy('id')->take('4')->get();;
        $this->data['orders']       = Invoice::orderBy('id')->take('8')->get();;
        return view('statistics::admin.dashboard.index', $this->data);
    }


    public function cashInHand()
    {
        $totalCashIn        = Receipt::sum('amount');
        $totalCashOut       = Payment::sum('amount');
        return number_format($totalCashIn - $totalCashOut, 2);
    }


    public function cashInBank()
    {
        $totalDeposit       = Deposit::sum('amount');
        $totalWithdraw      = BankWithdraw::sum('amount');
        return number_format($totalDeposit - $totalWithdraw, 2);
    }

    public function invest()
    {
        $totalInvest        = Invest::sum('amount');
        $totalWithdraw      = Withdraw::sum('amount');
        return number_format($totalInvest - $totalWithdraw, 2);
    }


}
