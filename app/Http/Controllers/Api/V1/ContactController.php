<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Repositories\ContactRepositoryInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class ContactController
 */
class ContactController extends Controller
{
    /**
     * ContactController constructor.
     *
     * @param ContactRepositoryInterface $repo
     */
    public function __construct(private ContactRepositoryInterface $repo) {}

    /**
     * Display a listing of contacts.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ContactResource::collection($this->repo->all());
    }

    /**
     * Store a newly created contact.
     *
     * @param StoreContactRequest $request
     * @return ContactResource
     */
    public function store(StoreContactRequest $request): ContactResource
    {
        $contact = $this->repo->create($request->validated());
        return new ContactResource($contact);
    }

    /**
     * Display the specified contact.
     *
     * @param int $id
     * @return ContactResource
     */
    public function show(int $id): ContactResource
    {
        return new ContactResource($this->repo->find($id));
    }

    /**
     * Update the specified contact.
     *
     * @param UpdateContactRequest $request
     * @param int $id
     * @return ContactResource
     */
    public function update(UpdateContactRequest $request, int $id): ContactResource
    {
        $contact = $this->repo->update($id, $request->validated());
        return new ContactResource($contact);
    }

    /**
     * Remove the specified contact.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->repo->delete($id);
        return response()->json(['message' => 'Contact deleted'], 204);
    }
}
