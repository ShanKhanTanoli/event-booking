<?php

namespace App\Helpers\Stripe\Traits;

use Exception;
use Illuminate\Support\Str;
use App\Helpers\Business\Business;

trait StripeCard
{
    public static function CreateCardToken($holder_name, $number, $exp_month, $exp_year, $cvc)
    {
        try {
            if ($stripe = self::Client()) {
                return $stripe->tokens->create([
                    'card' => [
                        'name' => $holder_name,
                        'number' => $number,
                        'exp_month' => $exp_month,
                        'exp_year' => $exp_year,
                        'cvc' => $cvc,
                    ],
                ]);
            } else return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function CardChargeForClient($card,$amount, $currency, $source, $application_fee_amount, $description, $stripe_account)
    {
        try {
            if ($stripe = self::Client()) {
                $token = $stripe->tokens->create([
                    'card' => $card,
                ]);
                $charge = $stripe->charges->create([
                    'amount' => $amount,
                    'currency' => $currency,
                    'source' => $source,
                    'application_fee_amount' => $application_fee_amount,
                    'description' => $description,
                ], ['stripe_account' => $stripe_account]);
            } else return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        }
    }


    public static function CardChargeForBusiness($card,$amount,$currency,$user,$plan)
    {
        try {
            if ($stripe = self::Client()) {
                $token = $stripe->tokens->create([
                    'card' => $card,
                ]);
                $charge = $stripe->charges->create([
                    'amount' => $amount,
                    'currency' => $currency,
                    'source' => $token->id,
                ]);
                return Business::CreateSubscription($user,$charge->id,Str::random(10), $plan);
            } else return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        }
    }


}