<?php

namespace App\Http\Livewire;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

use Log;
use Carbon\Carbon;
use Str;

class MahasiswaDt extends TableComponent
{
    use HtmlComponents;

    public $transactionId;
    public $showMode; # unconfirmed all bytransid

    public $offlineIndicator = false;
    public $clearSearchButton = false;
    // public $exports = ['csv', 'xls', 'xlsx', 'pdf'];
    public $loadingIndicator = false;
    // public $tableFooterEnabled = true;

    public $sortDefaultIcon = '';
    public $ascSortIcon = '<svg class="inline w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
        </svg>';
    public $descSortIcon = '<svg class="inline w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
        </svg>';

    public function query() : Builder
    {
        return Mahasiswa::query();
    }

    public function columns() : array
    {
        //
        return [
            Column::make('ID')
                ->searchable()
                ->sortable(),
            Column::make('Nama')
                ->searchable()
                ->sortable(),
            // Column::make('Jumlah Bayar', 'confirmed_payment_amount')
            //     ->format(function(StorePayment $model) {
            //         return $model->payment_amount;
            //     }),
            // Column::make('Terkonfirmasi (Rp)', 'confirmed_payment_amount'),
            // // Column::make('Qty', 'qty')
            // //     ->searchable()
            // //     ->sortable(),
            // // Column::make('Harga DP (Rp)', 'due_dp_price'),
            // Column::make('Bukti Transaksi', '_')
            //     ->format(function(StorePayment $model) {
            //         return $this->secureLink($model->getFirstMediaUrl('proof_of_trans'), 'Lihat bukti pembayaran');
            //     }),
            // Column::make('Dikonfirmasi oleh', '_')
            //     ->format(function(StorePayment $model) {
            //         if ($model->confirmed_by_user_id == null) {
            //             return "Menunggu konfirmasi";
            //         } else {
            //             return $model->confirmingUser()->name;
            //         }
            //     }),
            // Column::make('Note', 'note')
            //     ->searchable()
            //     ->sortable()
            //     // ->raw()
            //     ->format(function(StorePayment $model) {
            //         return $this->html(nl2br(e($model->note)));
            //     }),
            // Column::make('Actions', '_')
            //     ->format(function(StorePayment $model) {
            //         return View('components.actions.table-fungsio-payment-confirming', compact('model'));
            //     })
        ];
    }
}
