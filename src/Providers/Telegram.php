<?php

/*
 * This file is part of nodeloc/oauth-telegram.
 *
 * Copyright (c) 2021 Nodeloc.
 *
 *  For the full copyright and license information, please view the LICENSE.md
 *  file that was distributed with this source code.
 */

namespace Nodeloc\OAuthTelegram\Providers;

use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;
use Nodeloc\OAuth2\Client\Provider\Telegram as TelegramProvider;
use Nodeloc\OAuth2\Client\Provider\TelegramResourceOwner;

class Telegram extends Provider
{
    /**
     * @var TelegramProvider
     */
    protected $provider;

    public function name(): string
    {
        return 'telegram';
    }

    public function link(): string
    {
        return 'https://developer.telegram.com/docs/login-with-telegram/register-web.html';
    }

    public function fields(): array
    {
        return [
            'client_id' => 'required',
            'client_secret' => 'required',
        ];
    }

    public function provider(string $redirectUri): AbstractProvider
    {
        return $this->provider = new TelegramProvider([
            'clientId' => $this->getSetting('client_id'),
            'clientSecret' => $this->getSetting('client_secret'),
            'redirectUri' => $redirectUri,
        ]);
    }

    public function suggestions(Registration $registration, $user, string $token)
    {
        /** @var TelegramResourceOwner $user */
        $username = $user->getName();
        $avatar_url = $user->getAvatar();
        $registration
            ->provide('username', $username)
            ->provide('avatar_url', $avatar_url)
            ->setPayload($user->toArray());
    }
}
