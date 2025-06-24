<?php

use function Pest\Laravel\get;

test('homepage loads', function () {
    get('/')->assertOk();
});
