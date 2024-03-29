<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('webhooks', fn() => true);
