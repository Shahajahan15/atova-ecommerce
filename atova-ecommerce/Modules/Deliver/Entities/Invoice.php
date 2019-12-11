<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $timestamps      = false;
    protected $table        = "deliver__invoice";

    protected $fillable     = ['type', 'date', 'challan_no', 'note', 'employees_id', 'users_id', 'status', 'deliver__status_id'];


    /**
     * Supplier of a Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function customer()
    {
        return $this->belongsTo('Modules\Deliver\Entities\Customer', 'users_id', 'users_id');
    }



    /**
     * Supplier of a Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function employee()
    {
        return $this->belongsTo('Modules\Deliver\Entities\Employee', 'employees_id', 'users_id');
    }

    /**
     * Show user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo('Modules\Deliver\Entities\User', 'users_id', 'id');
    }


    /**
     * Supplier of a Invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function items()
    {
        return $this->hasMany('Modules\Deliver\Entities\InvoiceItem', 'deliver__invoice_id', 'id');
    }
}
