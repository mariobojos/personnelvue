<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Skill;

class SkillManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_skill_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/skills', [
            'skill' => 'PHP',
            'category' => 'TECHNICAL',
        ]);

        $this->assertCount(1, Skill::all());
    }
}
