<?php

namespace App\Helpers\Business\Traits;


trait BusinessAbilities
{

    /*Begin::Business Owner Abilities*/

    /*Begin::Clients*/
    public static function CanViewClients($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_view_client;
            } else return false;
        } else return false;
    }
    public static function CanCreateClient($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_create_client;
            } else return false;
        } else return false;
    }
    public static function CanUpdateClient($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_update_client;
            } else return false;
        } else return false;
    }
    public static function CanDeleteClient($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_delete_client;
            } else return false;
        } else return false;
    }
    public static function CanVerifyClient($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_verify_client;
            } else return false;
        } else return false;
    }

    public static function CanUnVerifyClient($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_un_verify_client;
            } else return false;
        } else return false;
    }
    /*End::Clients*/

    /*Begin::Reservations*/
    public static function CanViewReservations($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_view_reservation;
            } else return false;
        } else return false;
    }
    public static function CanCreateReservation($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_create_reservation;
            } else return false;
        } else return false;
    }
    public static function CanUpdateReservation($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_update_reservation;
            } else return false;
        } else return false;
    }
    public static function CanDeleteReservation($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_delete_reservation;
            } else return false;
        } else return false;
    }
    /*End::Reservations*/

    /*Begin::Pricing Plans*/
    public static function CanViewPricingPlans($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_view_pricing_plan;
            } else return false;
        } else return false;
    }
    public static function CanCreatePricingPlans($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_create_pricing_plan;
            } else return false;
        } else return false;
    }
    public static function CanUpdatePricingPlans($user)
    {
        if ($self = self::Is($user)) {
            if (!is_null($self->abilities)) {
                return $self->abilities->can_update_pricing_plan;
            } else return false;
        } else return false;
    }
    /*End::Pricing Plans*/

    /*Begin::Business Owner Abilities*/
}
