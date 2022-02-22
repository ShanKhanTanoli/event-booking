<?php

namespace App\Helpers\Business\Traits;

use Exception;

trait BusinessStripePrice
{

    public static function StripePrices($user)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    return $stripe->prices->all([], ['stripe_account' => $account_id]);
                } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
            } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        }
    }

    public static function StripeCreatePrice($user, $data)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    return $stripe->prices->create($data,['stripe_account' => $account_id]);
                } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
            } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        }
    }

    public static function StripeRetrievePrice($user, $price_id)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    return $stripe->prices->retrieve($price_id, [], ['stripe_account' => $account_id]);
                } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
            } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        }
    }


    public static function UpdateStripePrice($user, $price_id, $values)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    return $stripe->prices->update($price_id, $values, ['stripe_account' => $account_id]);
                } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
            } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        }
    }
}
