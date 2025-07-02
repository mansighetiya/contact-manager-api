<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Collection;

/**
 * Interface ContactRepositoryInterface
 */
interface ContactRepositoryInterface
{
    /**
     * Get all contacts
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Find contact by ID
     *
     * @param int $id
     * @return Contact
     */
    public function find(int $id): Contact;

    /**
     * Create a new contact
     *
     * @param array $data
     * @return Contact
     */
    public function create(array $data): Contact;

    /**
     * Update contact
     *
     * @param int $id
     * @param array $data
     * @return Contact
     */
    public function update(int $id, array $data): Contact;

    /**
     * Delete contact
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
