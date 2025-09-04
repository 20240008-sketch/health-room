<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\StudentList;
use App\Livewire\StudentForm;
use App\Livewire\HealthRecordForm;

Route::get('/', StudentList::class)->name('students.index');
Route::get('/students/create', StudentForm::class)->name('students.create');
Route::get('/students/{student}/edit', StudentForm::class)->name('students.edit');
Route::get('/students/{student}/health-records/create', HealthRecordForm::class)->name('health-records.create');
Route::get('/students/{student}/health-records/{record}/edit', HealthRecordForm::class)->name('health-records.edit');
