<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\Criteria;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerPage extends Component
{
    public $criteria_id;
    public $questions = [];
    public $answers = [];

    public function updatedCriteriaId()
    {
        $this->loadQuestions();
    }

    public function loadQuestions()
    {
        $this->questions = Question::where('criteria_id', $this->criteria_id)->get();

        // reset jawaban setiap ganti criteria
        $this->answers = [];
        foreach ($this->questions as $q) {
            $this->answers[$q->id] = '';
        }
    }

    public function save()
    {
        foreach ($this->answers as $question_id => $answer_text) {
            Answer::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'question_id' => $question_id,
                ],
                [
                    'answer' => $answer_text,
                ]
            );
        }

        session()->flash('message', 'Jawaban berhasil disimpan.');
    }

    public function render()
    {
        $criterias = Criteria::all();

        return view('livewire.student.answer-page', compact('criterias'));
    }
}
