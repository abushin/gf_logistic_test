<?php

namespace App\Observers;

use App\Enums\DeliveryStatusEnum;
use App\Events\DeliveryDelivered;
use App\Models\Delivery;

class DeliveryObserver
{
    public function saved(Delivery $delivery): void
    {
        if ($delivery->status === DeliveryStatusEnum::DELIVERED) {
            event(new DeliveryDelivered($delivery));
        }
    }
}
