<?php

namespace Tests\Feature\Modules\Newsletter\Http\Controllers;

use Tests\TestCase;

/**
 * @see \Modules\Newsletter\Http\Controllers\NewsletterController
 */
class NewsletterControllerTest extends TestCase
{
    /**
     * @test
     */
    public function create_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('newsletters.create'));

        $response->assertOk();
        $response->assertViewIs('newsletter::create');
        $response->assertViewHas('newsletter');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->delete(route('newsletters.destroy', ['newsletter' => $newsletter]));

        $response->assertRedirect(route('newsletters.index'));
        $this->assertModelMissing($newsletter);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function edit_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('newsletters.edit', ['newsletter' => $newsletter]));

        $response->assertOk();
        $response->assertViewIs('newsletter::edit');
        $response->assertViewHas('newsletter');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('newsletters.index'));

        $response->assertOk();
        $response->assertViewIs('newsletter::index');
        $response->assertViewHas('newsletters');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->post(route('newsletters.store'), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('newsletters.index'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_validates_with_a_form_request()
    {
        $this->assertActionUsesFormRequest(
            \Modules\Newsletter\Http\Controllers\NewsletterController::class,
            'store',
            \Modules\Newsletter\Http\Requests\Store::class
        );
    }

    /**
     * @test
     */
    public function update_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->put(route('newsletters.update', ['newsletter' => $newsletter]), [
            // TODO: send request data
        ]);

        $response->assertRedirect(route('newsletters.index'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function update_validates_with_a_form_request()
    {
        $this->assertActionUsesFormRequest(
            \Modules\Newsletter\Http\Controllers\NewsletterController::class,
            'update',
            \Modules\Newsletter\Http\Requests\Store::class
        );
    }

    // test cases...
}
