<?php

namespace App\Services;

use App\Enums\DeliveryStatusEnum;
use App\Models\Delivery;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Throwable;

class DeliveryService
{
    /**
     * Change current delivery status to new status
     *
     * @param Delivery $delivery
     * @param int $newStatus
     * @return void
     * @throws Throwable
     */
    public function changeStatus(Delivery $delivery, int $newStatus): void
    {
        $this->validateChangeStatusFlow($delivery->status, $newStatus);

        try {
            DB::beginTransaction();
            $delivery->status = $newStatus;
            $delivery->save();
            DB::commit();
        } catch (Throwable) {
            throw new InternalErrorException('Internal Error');
        }
    }

    /**
     * Validate delivery flow
     *
     * @param $oldStatus
     * @param $newStatus
     * @return void
     */
    private function validateChangeStatusFlow($oldStatus, $newStatus): void
    {
        if ($oldStatus === DeliveryStatusEnum::PLANNED && $newStatus !== DeliveryStatusEnum::SHIPPED) {
            throw new InvalidArgumentException('Invalid status flow'); // todo write error message
        }

        if ($oldStatus === DeliveryStatusEnum::SHIPPED && $newStatus !== DeliveryStatusEnum::DELIVERED) {
            throw new InvalidArgumentException('Invalid status flow'); // todo write error message
        }

        // Another flow rules...
    }
}
