<?php

namespace App\Helpers\Event\Traits;

use App\Models\Slot;

trait Slots
{

    /*Begin::Slots*/
    public static function Slots($event)
    {
        return Slot::where('event_id', $event);
    }

    public static function SlotsLatestPaginate($event, $quantity)
    {
        return self::Slots($event)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountSlots($event)
    {
        return self::Slots($event)
            ->count();
    }

    public static function FindSlot($event, $slot)
    {
        return self::Slots($event)
            ->find($slot);
    }

    public static function FindSlotBySlug($event, $slug)
    {
        return self::Slots($event)->where('slug', $slug)
            ->first();
    }

    /*End::Slots*/
}
