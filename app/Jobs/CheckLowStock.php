<?php

namespace App\Jobs;

use App\Mail\LowStockNotification;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CheckLowStock implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue;

    public $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to(config('mail.admin_email'))->send(new LowStockNotification($this->product));
    }
}
