<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\DTO\TransferDTO;

class CreateTransferRequest extends FormRequest
{
    /**
     * Função que qutoriza a trasferencia
     * @return true
     */
    public function authorize(): true
    {
        return true;
    }

    /**
     * Verifica se existe carteira para o pagador e para o recebedor.
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'payer_id' => ['required', 'exists:wallets,id'],
            'payee_id' => ['required', 'exists:wallets,id'],
            'amount' => ['required', 'decimal', 'min:1'],
        ];
    }

    public function toDTO(): TransferDTO
    {
        return new TransferDTO(
            payerId: $this->input('payer_id'),
            payeeId: $this->input('payee_id'),
            amount: $this->input('amount')
        );
    }
}
