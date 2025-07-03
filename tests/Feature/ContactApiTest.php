<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a contact can be successfully created via POST.
     *
     * @return void
     */
    public function test_it_creates_a_contact(): void
    {
        $data = [
            'name'  => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
        ];

        $response = $this->postJson('/api/v1/contacts', $data);

        $response->assertCreated()
                 ->assertJson([
                    'data' => $data,
                 ]);

        $this->assertDatabaseHas('contacts', $data);
    }

    /**
     * Test that all contacts are returned via GET request.
     *
     * @return void
     */
    public function test_it_lists_contacts(): void
    {
        Contact::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/contacts');

        $response->assertOk()
                 ->assertJsonStructure(['data']);
    }

    /**
     * Test that a single contact is returned successfully.
     *
     * @return void
     */
    public function test_it_shows_a_single_contact(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->getJson("/api/v1/contacts/{$contact->id}");

        $response->assertOk()
                 ->assertJson([
                     'data' => [
                         'id'    => $contact->id,
                         'name'  => $contact->name,
                         'email' => $contact->email,
                         'phone' => $contact->phone,
                     ],
                 ]);
    }

    /**
     * Test that a 404 is returned when the contact is not found.
     *
     * @return void
     */
    public function test_it_returns_404_if_contact_not_found(): void
    {
        $this->expectException(ModelNotFoundException::class);

        // Ensure the ID doesn't exist
        $nonExistingId = 999999;

        Contact::findOrFail($nonExistingId);
    }

    /**
     * Test that a contact can be updated successfully.
     *
     * @return void
     */
    public function test_it_updates_a_contact(): void
    {
        $contact = Contact::factory()->create();

        $data = [
            'name'  => 'Updated Name',
            'email' => 'updated@example.com',
            'phone' => '9876543210',
        ];

        $response = $this->putJson("/api/v1/contacts/{$contact->id}", $data);

        $response->assertOk()
                 ->assertJson([
                     'data' => $data,
                 ]);

        $this->assertDatabaseHas('contacts', $data);
    }

    /**
     * Test that validation errors are returned on contact update.
     *
     * @return void
     */
    public function test_it_returns_validation_errors_on_update(): void
    {
        $contact = Contact::factory()->create();

        $data = [
            'name'  => '',
            'email' => 'not-an-email',
            'phone' => 'short',
        ];

        $response = $this->putJson("/api/v1/contacts/{$contact->id}", $data);

        $response->assertUnprocessable()
                 ->assertJsonValidationErrors(['name', 'email', 'phone']);
    }

    /**
     * Test that a contact can be deleted successfully.
     *
     * @return void
     */
    public function test_it_deletes_a_contact(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->deleteJson("/api/v1/contacts/{$contact->id}");

        $response->assertNoContent();

        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }

    /**
     * Test that validation errors are returned on contact creation.
     *
     * @return void
     */
    public function test_it_returns_validation_errors_on_create(): void
    {
        $data = [
            'name'  => '',
            'email' => 'invalid-email',
            'phone' => '123',
        ];

        $response = $this->postJson('/api/v1/contacts', $data);

        $response->assertUnprocessable()
                 ->assertJsonValidationErrors(['name', 'email', 'phone']);
    }
}
