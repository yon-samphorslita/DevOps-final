<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{get, post, actingAs};

uses(TestCase::class, RefreshDatabase::class)->in('Feature');
