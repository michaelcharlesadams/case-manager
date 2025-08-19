<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['matter_id','number','issue_date','due_date','status','subtotal','tax','total','paid_at'];

    public function matter() { return $this->belongsTo(Matter::class); }
    public function items() { return $this->hasMany(InvoiceItem::class); }

    public function recalcTotals(): void
    {
        $subtotal = $this->items()->sum('amount');
        $tax = 0; // adjust if using tax
        $this->update([
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $subtotal + $tax,
        ]);
    }
}
