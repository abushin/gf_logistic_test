<?php

namespace App\Http\Requests;

use App\Enums\DeliveryStatusEnum;
use RonasIT\Support\BaseRequest;

class DeliveryStatusChangeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'integer', 'in:' . implode(',', DeliveryStatusEnum::getStatuses())],
        ];
    }
}
