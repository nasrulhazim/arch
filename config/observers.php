<?php

return [
	\CleaniqueCoders\LaravelUuid\Observers\UuidObserver::class   => [
		\App\Models\Profile\Address::class,
		\App\Models\Profile\Email::class,
		\App\Models\Profile\Phone::class,
		\App\Models\Profile\Website::class,
		\App\Models\Audit::class,
		\App\Models\Media::class,
		\App\Models\PasswordHistory::class,
		\App\Models\User::class,
	],
];
