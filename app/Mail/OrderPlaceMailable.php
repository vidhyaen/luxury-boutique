<?php

namespace App\Mail;

use PDF;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class OrderPlaceMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $orders;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailable = $this->subject('Order is placed successfully')->markdown('accounts.email.placeorder');

        $basePath = $this->orders->order_request_pdf_base_path;
        $fileName = $this->orders->order_request_pdf_file_name;

        // try {
        //     Storage::delete($base_path . $file_name);
        // } catch (\Exception $e) {
        // }

        $data = [
            'orders' => $this->orders,
        ];
        $pdf = PDF::loadView('accounts.invoice', $data);
        Storage::disk('public')->put($basePath . $fileName, $pdf->output());



        // if ($this->orders->is_order_request_pdf_exist) {
        //     $base_path = $this->orders->order_request_pdf_base_path;
        //     $file_name = $this->orders->order_request_pdf_file_name;
        //     $path      = Storage::disk('public')->url($base_path . $file_name);
           

        //     $mailable->attach(
        //         $path,
        //         [
        //             'as'   => $file_name,
        //             'mime' => 'application/pdf',
        //         ]
        //     );
        // }
        return $mailable;
    }
}
