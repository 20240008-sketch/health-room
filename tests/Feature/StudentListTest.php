<?php

namespace Tests\Feature;

use App\Livewire\StudentList;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class StudentListTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public function test_can_show_student_list()
    {
        $student = Student::factory()->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeLivewire('student-list');
    }

    public function test_can_search_students()
    {
        $student1 = Student::factory()->create(['name' => 'Test Student']);
        $student2 = Student::factory()->create(['name' => 'Another Student']);

        Livewire::test(StudentList::class)
            ->set('search', 'Test')
            ->assertSee('Test Student')
            ->assertDontSee('Another Student');
    }

    public function test_can_filter_by_grade()
    {
        $student1 = Student::factory()->create(['grade' => 1]);
        $student2 = Student::factory()->create(['grade' => 2]);

        Livewire::test(StudentList::class)
            ->set('grade', '1')
            ->assertSee($student1->name)
            ->assertDontSee($student2->name);
    }

    public function test_can_delete_student()
    {
        $student = Student::factory()->create();

        Livewire::test(StudentList::class)
            ->call('deleteStudent', $student->id);

        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
