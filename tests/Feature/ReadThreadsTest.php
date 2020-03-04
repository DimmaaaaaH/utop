<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() :void
    {
    	parent::setUp();
		$this->thread = factory('App\Threads')->create();
    }

    /**  @test     */
    public function a_user_can_browse_threads()
    {
        $response = $this->get('/threads');
        $response->assertSee($this->thread->title);
    }



    // /** @test */
    // public function a_user_can_read_a_single_thread()
    // {
    // 	$response = $this->get('/threads/' . $this->thread->id);
    // 	$response->assertSee($this->threads->title);
    // }

	//  /** @test */
	// public function a_user_can_read_a_single_thread()
	// {
	// 	$response = $this->get('/threads/' . $this->thread->id);
	//     // $response->assertSee($this->thread->title);
	// }

	/** @test */
	public function a_user_can_read_replies_that_are_associated_with_a_thread()
	{
		$reply = factory('App\Reply')
			->create(['thread_id' => $this->thread_id]);
		
		$this->get('/threads/' . $this->thread->id)
			->assertSee($reply->body);
	}

}
