<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Collection;

/**
 * Class ContactRepository
 */
class ContactRepository implements ContactRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return Contact::all();
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): Contact
    {
        return Contact::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Contact
    {
        return Contact::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): Contact
    {
        $contact = Contact::findOrFail($id);
        $contact->update($data);
        return $contact;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        $contact = Contact::findOrFail($id);
        return $contact->delete();
    }
}
