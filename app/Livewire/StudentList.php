<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    public $layout = 'components.layouts.app';
    use WithPagination;

    public $search = '';
    public $grade = '';
    public $class = '';

    public function render()
    {
        $students = Student::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->grade, function ($query) {
                $query->where('grade', $this->grade);
            })
            ->when($this->class, function ($query) {
                $query->where('class', $this->class);
            })
            ->paginate(10);

        return view('livewire.student-list', [
            'students' => $students,
            'classes' => [
                '総合1', '総合2', '総合3', '調理', '福祉', 
                '進学', '特別進学', '情報会計'
            ],
            'grades' => [1, 2, 3]
        ]);
    }

    public function deleteStudent($id)
    {
        Student::find($id)->delete();
    }
}
