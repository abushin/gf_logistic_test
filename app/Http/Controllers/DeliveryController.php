<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryStatusChangeRequest;
use App\Models\Delivery;
use App\Services\DeliveryService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DeliveryController extends Controller
{
    public function statusChange(DeliveryStatusChangeRequest $request, Delivery $delivery): ResponseFactory|Application|\Illuminate\Http\Response
    {
        $validatedData = $request->validated();

        $deliveryService = new DeliveryService();
        try {
            $deliveryService->changeStatus($delivery, $validatedData['status']);
        } catch (InvalidArgumentException $e) {
            return response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (Throwable $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response('', Response::HTTP_OK);
    }
}
