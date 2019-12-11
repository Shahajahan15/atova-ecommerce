<?php

namespace Modules\Receiving\Entities;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $timestamps      = false;
    protected $table        = "receiving__invoice";

    protected $fillable     = ['type', 'date', 'challan_no', 'note', 'employees_id', 'users_id'];


    /**
     * Supplier of a Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function supplier()
    {
        return $this->belongsTo('Modules\Receiving\Entities\Supplier', 'users_id', 'users_id');
    }

    /**
     * Supplier of a Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo('Modules\Receiving\Entities\User', 'users_id', 'id');
    }



    /**
     * Supplier of a Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function employee()
    {
        return $this->belongsTo('Modules\Receiving\Entities\Employee', 'employees_id', 'users_id');
    }


    /**
     * Supplier of a Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function items()
    {
        return $this->hasMany('Modules\Receiving\Entities\InvoiceItem', 'receiving__invoice_id', 'id');
    }


    public static function status()
    {
        return [
            '1' => 'Quotation',
            '2' => 'Ordered',
            '3' => 'Received'
        ];
    }
}
