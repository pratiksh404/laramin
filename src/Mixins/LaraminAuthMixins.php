<?php

namespace Pratiksh\Laramin\Mixins;

use Pratiksh\Laramin\Http\Controllers\Auth\LoginController;
use Pratiksh\Laramin\Http\Controllers\Auth\RegisterController;
use Pratiksh\Laramin\Http\Controllers\Auth\ResetPasswordController;
use Pratiksh\Laramin\Http\Controllers\Auth\ForgotPasswordController;

class LaraminAuthMixins
{
    public function laraminauth()
    {
        /*  return function () {
            $this->get('login', [LoginController::class, 'showLoginForm'])->name('login');
            $this->post('login', [LoginController::class, 'login']);
            $this->post('logout', [LoginController::class, 'logout'])->name('logout');

            // Registration Routes...
            $this->get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
            $this->post('register', [RegisterController::class, 'register']);

            // Password Reset Routes...
            $this->get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm']);
            $this->post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
            $this->get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm']);
            $this->post('password/reset', [ResetPasswordController::class, 'reset']);
        }; */
        /**
         * Register the typical authentication routes for an application.
         *
         * @param  array  $options
         * @return callable
         */

        return function ($options = []) {
            $namespace = "Pratiksh\Laramin\Http\Controllers";

            $this->group(['namespace' => $namespace], function () use ($options) {
                // Login Routes...
                if ($options['login'] ?? true) {
                    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
                    $this->post('login', 'Auth\LoginController@login');
                }

                // Logout Routes...
                if ($options['logout'] ?? true) {
                    $this->post('logout', 'Auth\LoginController@logout')->name('logout');
                }

                // Registration Routes...
                if ($options['register'] ?? true) {
                    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
                    $this->post('register', 'Auth\RegisterController@register');
                }

                // Password Reset Routes...
                if ($options['reset'] ?? true) {
                    $this->resetPassword();
                }

                // Password Confirmation Routes...
                if (
                    $options['confirm'] ??
                    class_exists($this->prependGroupNamespace('Auth\ConfirmPasswordController'))
                ) {
                    $this->confirmPassword();
                }

                // Email Verification Routes...
                if ($options['verify'] ?? false) {
                    $this->emailVerification();
                }
            });
        };
    }

    /**
     * Register the typical reset password routes for an application.
     *
     * @return callable
     */
    public function resetPassword()
    {
        return function () {
            $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
            $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
            $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
        };
    }

    /**
     * Register the typical confirm password routes for an application.
     *
     * @return callable
     */
    public function confirmPassword()
    {
        return function () {
            $this->get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
            $this->post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
        };
    }

    /**
     * Register the typical email verification routes for an application.
     *
     * @return callable
     */
    public function emailVerification()
    {
        return function () {
            $this->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
            $this->get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
            $this->post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
        };
    }
}
