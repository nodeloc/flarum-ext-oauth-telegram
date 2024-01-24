<?php

/*
 * This file is part of nodeloc/oauth-telegram.
 *
 * Copyright (c) 2021 Nodeloc.
 *
 *  For the full copyright and license information, please view the LICENSE.md
 *  file that was distributed with this source code.
 */

namespace Nodeloc\OAuthTelegram;

use Flarum\Extend;
use FoF\OAuth\Extend as OAuthExtend;
use Nodeloc\OAuthTelegram\Providers\Telegram;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__.'/locale'),

    (new OAuthExtend\RegisterProvider(Telegram::class)),
];
