<?php

namespace App\Helpers\Event;

use App\Models\Event as EventModel;

class Event
{

    public static function all()
    {
        return EventModel::all();
    }

    public static function LatestPaginate($quantity)
    {
        return EventModel::latest()
            ->paginate($quantity);
    }

    public static function count()
    {
        return EventModel::count();
    }

    public static function Find($currency)
    {
        $find = EventModel::find($currency);
        if ($find) {
            return $find;
        } else return false;
    }

    public static function FindBySlug($slug)
    {
        $find = EventModel::where('slug', $slug)->first();
        if ($find) {
            return $find;
        } else return false;
    }

    public static function FindById($id)
    {
        $find = EventModel::where('id', $id)->first();
        if ($find) {
            return $find;
        } else return false;
    }
}
