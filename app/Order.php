<?php

namespace App;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Order extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function payment()
    {
        return $this->belongsTo(PaymentMode::class, 'payment_mode_id', 'id');
    }
    public function orderstatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }
    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function getOrderRequestPdfFileNameAttribute()
    {
        $fileName = 'order_request_' . $this->id . '.pdf';
        return $fileName;
    }

    public function getOrderRequestPdfBasePathAttribute()
    {
        $folderPath = 'uploads/orders/';
        return $folderPath;
    }

    public function getIsOrderRequestPdfExistAttribute()
    {
        $fileName = 'order_request_' . $this->id . '.pdf';
        $folderPath = 'uploads/orders/';

        if (File::exists(public_path($folderPath . $fileName)) || Storage::disk('public')->exists($folderPath . $fileName)) {
            return true;
        }
        return false;
    }

    public function getIsInvoiceFileExistAttribute()
    {
        if (strlen(trim($this->invoice)) && (File::exists(public_path(trim($this->invoice))) || Storage::disk('public')->exists(trim($this->invoice)))) {
            return true;
        }
        return false;
    }
}
