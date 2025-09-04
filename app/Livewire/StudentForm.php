<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentForm extends Component
{
    public Student $student;
    public $studentId;
    public $name = '';
    public $grade = 1;
    public $class = '総合1';

    protected $rules = [
        'name' => 'required|string|max:255',
        'grade' => 'required|integer|between:1,3',
        'class' => 'required|string'
    ];

    public function mount($studentId = null)
    {
        if ($studentId) {
            $this->studentId = $studentId;
            $this->student = Student::find($studentId);
            $this->name = $this->student->name;
            $this->grade = $this->student->grade;
            $this->class = $this->student->class;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->studentId) {
            $this->student->update([
                'name' => $this->name,
                'grade' => $this->grade,
                'class' => $this->class,
            ]);
        } else {
            Student::create([
                'name' => $this->name,
                'grade' => $this->grade,
                'class' => $this->class,
            ]);
        }

        $this->reset(['name', 'grade', 'class']);
        $this->dispatch('student-saved');
    }

    public function render()
    {
        return view('livewire.student-form', [
            'classes' => [
                '総合1', '総合2', '総合3', '調理', '福祉', 
                '進学', '特別進学', '情報会計'
            ],
            'grades' => [1, 2, 3]
        ]);
    }
}
