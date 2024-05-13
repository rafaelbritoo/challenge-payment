<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Type\Decimal;

/**
 * @property Decimal amount
 */
class Wallet extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'wallet';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'customers_id',
        'amount',
    ];

    public function belongsToCustomer(): bool
    {
        return $this->attributes['customers_id'] == Customer::class;
    }

    public function hasAmount(int $amount): bool
    {
        return $this->amount < $amount;
    }

}
