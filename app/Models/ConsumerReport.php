<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ConsumerReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'contact_number',
        'privacy_consent',
        'marketing_consent',
        'batch_number',
        'store_name',
        'purchase_date',
        'country',
        'amount_paid',
        'proof_of_purchase',
        'categories',
        'other_category',
        'description',
    ];
}
