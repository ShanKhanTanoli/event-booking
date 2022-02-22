<?php

namespace App\Helpers\Business\Traits;

use Exception;

trait BusinessStripeProduct
{

    public static function StripeProducts($user)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    return $stripe->products->all([], ['stripe_account' => $account_id]);
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

    public static function StripeCreateProduct($user,$data)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    return $stripe->products->create($data, ['stripe_account' => $account_id]);
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

    public static function StripeRetrieveProduct($user, $product_id)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    return $stripe->products->retrieve($product_id, [], ['stripe_account' => $account_id]);
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


    public static function UpdateStripeProduct($user, $product_id, $values)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    $stripe->products->update($product_id, $values, ['stripe_account' => $account_id]);
                    session()->flash('success', 'Updated Successfully');
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

    public static function DeleteStripeProduct($user, $product_id)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($account_id = self::StripeConnectAccountID($user)) {
                    $stripe->products->delete($product_id,[], ['stripe_account' => $account_id]);
                    return session()->flash('success', 'Deleted Successfully');
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
            return session()->flash('error', $e->getMessage());
        }
    }
}
