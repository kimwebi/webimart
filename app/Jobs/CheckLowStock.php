<?php

namespace App\Jobs;

use App\Mail\LowStockNotification;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class CheckLowStock implements ShouldQueue
{
    use Queueable;

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
        Mail::to('ADMIN_EMAIL', 'kimwebi14@gmail.com')->send(new LowStockNotification($this->product));
    }
}
