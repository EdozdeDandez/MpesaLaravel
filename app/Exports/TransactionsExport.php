<?php
/**
 * Created by PhpStorm.
 * User: kandie
 * Date: 5/25/18
 * Time: 9:47 AM
 */

namespace App\Exports;


use App\Repositories\TransactionRepository;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionsExport implements FromView, ShouldAutoSize
{
    use Exportable;
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function view(): View
    {
        $transactions = $this->transactionRepository->all();
        return view('pages.transactions.export', compact('transactions'));
    }

}
