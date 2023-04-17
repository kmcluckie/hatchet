<?php

beforeEach(function () {
    $this->seed();
});

test('returns all records with no filters', function () {
    $response = $this->get('/locations');
    $response->assertJsonCount(9);
});

test('filters on name', function () {
    $response = $this->get('/locations?name=street');
    $response->assertJsonCount(6);
    $first = $response->json()[0];
    expect($first['name'])->toContain('Street');
});

test('filters for correct number of offices', function () {
    $response = $this->get('/locations?offices=4');
    $response->assertJsonCount(2);
    $first = $response->json()[0];
    expect($first['offices'])->toBe(4);
});

test('filters for correct number of tables', function () {
    $response = $this->get('/locations?tables=4');
    $response->assertJsonCount(1);
    $first = $response->json()[0];
    expect($first['tables'])->toBe(4);
});

test('filters for minimum sqm value', function () {
    $response = $this->get('/locations?sqm_gte=100');
    $response->assertJsonCount(8);
    $first = $response->json()[0];
    expect($first['sqm'])->toBeGreaterThanOrEqual(100);
});

test('filters for maximum sqm value', function () {
    $response = $this->get('/locations?sqm_lte=200');
    $response->assertJsonCount(5);
    $first = $response->json()[0];
    expect($first['sqm'])->toBeLessThanOrEqual(200);
});

test('filters for combined minimum and maximum sqm value', function () {
    $response = $this->get('/locations?sqm_gte=100&sqm_lte=200');
    $response->assertJsonCount(4);
});

test('filters for minimum price value', function () {
    $response = $this->get('/locations?price_gte=1000');
    $response->assertJsonCount(6);
    $first = $response->json()[0];
    expect($first['price'])->toBeGreaterThanOrEqual(1000);
});

test('filters for maximum price value', function () {
    $response = $this->get('/locations?price_lte=1400');
    $response->assertJsonCount(5);
    $first = $response->json()[0];
    expect($first['price'])->toBeLessThanOrEqual(1400);
});

test('filters for combined minimum and maximum price value', function () {
    $response = $this->get('/locations?price_gte=1000&price_lte=1300');
    $response->assertJsonCount(2);
});

test('filters on combination of filters', function () {
    $response = $this->get('/locations?name=street&offices=3&price_lte=1700');
    $response->assertJsonCount(1);
});
