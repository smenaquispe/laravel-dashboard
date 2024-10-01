<?php

namespace App\Contracts;
use Illuminate\Database\Eloquent\Collection;

interface Client
{
    /**
     * Create a new client
     *
     * @param array $data
     * @return array
     */
    public function create(array $data): Client;
    /**
     * Read a client
     *
     * @param int $id
     * @return array
     */
    public function read(int $id): Client;
    /**
     * Update a client
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update_(int $id, array $data): Client;
    /**
     * Delete a client
     *
     * @param int $id
     * @return bool
     */
    public function delete_(int $id): bool;
    /**
     * List all clients
     *
     * @return array
     */
    public static function list(): Collection;
}