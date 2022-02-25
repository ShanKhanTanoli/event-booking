<?php

namespace App\Helpers\Admin\Traits;

use App\Models\User;
use App\Models\BusinessAbility;

trait BusinessTrait
{

    public static function CheckBusiness($user)
    {
        if (!is_null($business = User::withTrashed()->find($user))) {
            if ($business->role == 'business' && $business->role_id == 2) {
                return $business;
            } else return false;
        } else return false;
    }

    
    public static function CheckBusinessByRegNo($reg_no)
    {
        if (!is_null($business = User::withTrashed()->where('reg_no',$reg_no)->first())) {
            if ($business->role == 'business' && $business->role_id == 2) {
                return $business;
            } else return false;
        } else return false;
    }

    public static function BusinessEmailStatus($user)
    {
        if ($business = self::CheckBusiness($user)) {
            if (!is_null($business->email_verified_at)) {
                return $business;
            } else return false;
        } else return false;
    }

    public static function BusinessIsVerified($user)
    {
        if(self::BusinessEmailStatus($user)) {
            return true;
        }else return false;
    }


    public static function BusinessClients($user)
    {
        if ($business = self::CheckBusiness($user)) {
            return User::withTrashed()->where('created_by',$business->id);
        } else return false;
    }

    public static function CountBusinessClients($user)
    {
        return self::BusinessClients($user)->count();
    }

    public static function VerifiedBusiness()
    {
        return User::withTrashed()
            ->where('role', 'business')
            ->where('email_verified_at', '!=', null);
    }

    public static function CountVerifiedBusiness()
    {
        return self::VerifiedBusiness()->count();
    }

    public static function UnverifiedBusiness()
    {
        return User::withTrashed()
            ->where('role', 'business')
            ->where('email_verified_at', null);
    }

    public static function CountUnverifiedBusiness()
    {
        return self::UnverifiedBusiness()->count();
    }


    public static function AllBusiness()
    {
        return User::withTrashed()
        ->where('role', 'business');
    }

    public static function CountAllBusiness()
    {
        return self::AllBusiness()->count();
    }

    public static function ActiveBusiness()
    {
        return User::where('role', 'business');
    }

    public static function CountActiveBusiness()
    {
        return self::ActiveBusiness()->count();
    }

    public static function BannedBusiness()
    {
        return User::onlyTrashed()
            ->where('role', 'business');
    }

    public static function CountBannedBusiness()
    {
        return self::BannedBusiness()->count();
    }


        /*Begin::Business Owner Abilities*/
        public static function BusinessAbilities($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities;
                } else{
                    return BusinessAbility::create([
                        'user_id' => $self->id,
                        
                        'can_view_reservation' => 0,
                        'can_create_reservation' => 0,
                        'can_update_reservation' => 0,
                        'can_delete_reservation' => 0,
        
                        'can_view_client' => 0,
                        'can_create_client' => 0,
                        'can_update_client' => 0,
                        'can_delete_client' => 0,
                        'can_verify_client' => 0,
        
                    ]);
                };
            } else return false;
        }

        public static function BusinessCanViewClients($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_view_client;
                } else return false;
            } else return false;
        }
        public static function BusinessCanCreateClients($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_create_client;
                } else return false;
            } else return false;
        }
        public static function BusinessCanUpdateClients($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_update_client;
                } else return false;
            } else return false;
        }
        public static function BusinessCanDeleteClients($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_delete_client;
                } else return false;
            } else return false;
        }
        public static function BusinessCanVerifyClients($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_verify_client;
                } else return false;
            } else return false;
        }
        public static function BusinessCanUnVerifyClients($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_un_verify_client;
                } else return false;
            } else return false;
        }

    
        public static function BusinessCanViewReservations($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_view_reservation;
                } else return false;
            } else return false;
        }
        public static function BusinessCanCreateReservations($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_create_reservation;
                } else return false;
            } else return false;
        }
        public static function BusinessCanUpdateReservations($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_update_reservation;
                } else return false;
            } else return false;
        }
        public static function BusinessCanDeleteReservations($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_delete_reservation;
                } else return false;
            } else return false;
        }


        public static function BusinessCanViewPricingPlans($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_view_pricing_plan;
                } else return false;
            } else return false;
        }
        public static function BusinessCanCreatePricingPlans($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_create_pricing_plan;
                } else return false;
            } else return false;
        }
        public static function BusinessCanUpdatePricingPlans($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_update_pricing_plan;
                } else return false;
            } else return false;
        }
        public static function BusinessCanDeletePricingPlans($user)
        {
            if ($self = self::CheckBusiness($user)) {
                if (!is_null($self->abilities)) {
                    return $self->abilities->can_delete_pricing_plan;
                } else return false;
            } else return false;
        }
        /*Begin::Business Owner Abilities*/
}
