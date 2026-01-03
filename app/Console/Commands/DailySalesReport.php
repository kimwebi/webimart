<?php

namespace App\Console\Commands;

use App\Mail\DailySalesReportMail;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class DailySalesReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales:report';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily sales report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        $orders = Order::whereDate('created_at', $today)->with('items.product')->get();
        $soldProducts = $orders->flatMap->items->groupBy('product.name')->map(fn($group) => $group->sum('quantity'));

        Mail::to(env('ADMIN_EMAIL'))->send(new DailySalesReportMail($soldProducts));
    }
}
