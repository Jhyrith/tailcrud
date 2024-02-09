<?php
use App\Models\User;

test('task page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/tasks');

    $response->assertOk();
});