<?php

namespace App\Enums;

/**
 * Note: Я бы уточнил у заказчика, требуются ли статусы отмены.
 */
final class DeliveryStatusEnum implements EnumInterface
{
    public const PLANNED = 1;
    public const SHIPPED = 2;
    public const DELIVERED = 3;

    private static array $validValues = [
        self::PLANNED,
        self::SHIPPED,
        self::DELIVERED,
    ];

    public static function getStatuses(): array
    {
        return [
            self::PLANNED,
            self::SHIPPED,
            self::DELIVERED,
        ];
    }

    public static function getValues(): array
    {
        return self::$validValues;
    }

    public static function isValidValue($value): bool
    {
        return in_array($value, self::$validValues, true);
    }
}
