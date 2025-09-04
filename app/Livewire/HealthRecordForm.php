<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\HealthRecord;
use Livewire\Component;

class HealthRecordForm extends Component
{
    public $studentId;
    public $recordId;
    public $height;
    public $weight;
    public $visionLeftUncorrected;
    public $visionRightUncorrected;
    public $visionLeftCorrected;
    public $visionRightCorrected;
    public $hearingTest = false;
    public $dentalExam = false;
    public $recordedDate;

    protected $rules = [
        'height' => 'required|numeric|between:50,250',
        'weight' => 'required|numeric|between:20,200',
        'visionLeftUncorrected' => 'nullable|numeric|between:0,2',
        'visionRightUncorrected' => 'nullable|numeric|between:0,2',
        'visionLeftCorrected' => 'nullable|numeric|between:0,2',
        'visionRightCorrected' => 'nullable|numeric|between:0,2',
        'hearingTest' => 'required|boolean',
        'dentalExam' => 'required|boolean',
        'recordedDate' => 'required|date'
    ];

    public function mount($studentId, $recordId = null)
    {
        $this->studentId = $studentId;
        
        if ($recordId) {
            $record = HealthRecord::find($recordId);
            $this->recordId = $recordId;
            $this->height = $record->height;
            $this->weight = $record->weight;
            $this->visionLeftUncorrected = $record->vision_left;
            $this->visionRightUncorrected = $record->vision_right;
            $this->visionLeftCorrected = $record->vision_left_corrected;
            $this->visionRightCorrected = $record->vision_right_corrected;
            $this->hearingTest = $record->hearing_test;
            $this->dentalExam = $record->dental_exam;
            $this->recordedDate = $record->recorded_date;
        } else {
            $this->recordedDate = now()->toDateString();
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'student_id' => $this->studentId,
            'height' => $this->height,
            'weight' => $this->weight,
            'vision_left' => $this->visionLeftUncorrected,
            'vision_right' => $this->visionRightUncorrected,
            'vision_left_corrected' => $this->visionLeftCorrected,
            'vision_right_corrected' => $this->visionRightCorrected,
            'hearing_test' => $this->hearingTest,
            'dental_exam' => $this->dentalExam,
            'recorded_date' => $this->recordedDate
        ];

        if ($this->recordId) {
            HealthRecord::find($this->recordId)->update($data);
        } else {
            HealthRecord::create($data);
        }

        $this->dispatch('health-record-saved');
    }

    public function render()
    {
        return view('livewire.health-record-form');
    }
}
