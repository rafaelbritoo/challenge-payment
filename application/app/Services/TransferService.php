<?php

namespace App\Services;

use App\Contracts\NotificationContract;
use App\Contracts\PaymentGatewayContract;
use App\DTO\TransferDTO;
use App\Enum\TransferStatusEnum;
use App\Exceptions\TransferException;
use App\Models\Customer;
use App\Models\Wallet;
use App\Repositories\CustomerRepository;
use App\Repositories\TransferRepository;
use App\Repositories\WalletRepository;
use Illuminate\Support\Facades\DB;

class TransferService implements PaymentGatewayContract, NotificationContract
{
    public function __construct(
        private TransferRepository     $transferRepository,
        private WalletRepository       $walletRepository,
        private PaymentGatewayContract $paymentGateway,
        private NotificationContract   $notificationContract,
        private CustomerRepository     $customerRepository,
    )
    {
    }

    /**
     * @throws TransferException
     */
    public function handle(TransferDTO $transferDTO): bool
    {
        // payer validations
        $payerWallet   = $this->walletRepository->findById($transferDTO->payerId);
        $payerCustomer = $this->customerRepository->findById($transferDTO->payerId);

        $this->validatePaymentConditions($payerWallet, $payerCustomer, $transferDTO);


        return DB::transaction(function () use ($payerWallet, $transferDTO) {
            $transaction = $this->transferRepository->startTransfer($transferDTO);
            $payeeWallet = $this->walletRepository->findById($transferDTO->payeeId);

            $this->walletRepository->deposit($payeeWallet->getKey(), $transferDTO->amount);
            $this->walletRepository->withdrawal($payerWallet->getKey(), $transferDTO->amount);
            $this->transferRepository->updateTransferStatus($transaction->getKey(), TransferStatusEnum::Done);

            if (!$this->paymentGateway->authorizePayment()) {
                throw TransferException::notAuthorizedByGateway($this->paymentGateway);
            }

            if (!$this->notificationContract->sendPaymentApproval()) {
                throw TransferException::paymentMessageNotSent($this->notificationContract);
            }

            return true;
        });
    }

    /**
     * @throws TransferException
     */
    private function validatePaymentConditions(Wallet $payerWallet, Customer $payerCustomer, TransferDTO $transferDTO): void
    {
        if ($payerCustomer->isCnpj()) {
            throw TransferException::customerNotAllowedToPay();
        }

        if ($payerWallet->hasAmount($transferDTO->amount)) {
            throw TransferException::outOfPocket();
        }
    }

    public function getProviderName()
    {
        // TODO: Implement getProviderName() method.
    }

    public function sendPaymentApproval(): bool
    {
        // TODO: Implement sendPaymentApproval() method.
    }

    public function getPaymentGatewayName(): string
    {
        // TODO: Implement getPaymentGatewayName() method.
    }

    public function authorizePayment(): bool
    {
        // TODO: Implement authorizePayment() method.
    }
}
