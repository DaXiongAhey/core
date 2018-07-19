<?php

/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        $schema->table('email_tokens', function (Blueprint $table) {
            $table->renameColumn('id', 'token');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    },

    'down' => function (Builder $schema) {
        $schema->table('email_tokens', function (Blueprint $table) {
            $table->renameColumn('token', 'id');

            $table->dropForeign('email_tokens_user_id_foreign');
        });
    }
];
