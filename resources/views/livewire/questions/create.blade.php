<?php

use Livewire\Volt\Component;
use App\Models\Criteria;
use App\Models\Question;
use App\Models\Answer;

new class extends Component {
    public $criterias;
    public $criteria_id;
    public $questions = [];

    public function mount()
    {
        $this->criterias = Criteria::all();
        $this->addQuestion(); // start with 1 blank
    }

    public function addQuestion()
    {
        $this->questions[] = [
            'type' => 'multiple',
            'question_text' => '',
            'answers' => [
                ['answer_text' => '', 'point' => 0],
            ],
        ];
    }

    public function removeQuestion($index)
    {
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions);
    }

    public function addAnswer($qIndex)
    {
        $this->questions[$qIndex]['answers'][] = ['answer_text' => '', 'point' => 0];
    }

    public function removeAnswer($qIndex, $aIndex)
    {
        unset($this->questions[$qIndex]['answers'][$aIndex]);
        $this->questions[$qIndex]['answers'] = array_values($this->questions[$qIndex]['answers']);
    }

    public function save()
    {
        $this->validate([
            'criteria_id' => 'required|exists:criterias,id',
            'questions.*.question_text' => 'required|string',
        ]);

        foreach ($this->questions as $q) {
            $question = Question::create([
                'criteria_id' => $this->criteria_id,
                'type' => $q['type'],
                'question_text' => $q['question_text'],
            ]);

            if ($q['type'] === 'multiple') {
                foreach ($q['answers'] as $a) {
                    if ($a['answer_text'] != '') {
                        Answer::create([
                            'question_id' => $question->id,
                            'answer_text' => $a['answer_text'],
                            'point' => (int)$a['point'],
                        ]);
                    }
                }
            }
        }

        $this->questions = [];
        $this->addQuestion();
        session()->flash('message', 'Questions saved!');
    }
};
?>
<div class="container py-4">
    <h2 class="fw-bold mb-4">Manage Questions & Answers</h2>

    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="mb-4">
        <label class="form-label fw-semibold">Select Criteria</label>
        <select wire:model="criteria_id" class="form-select">
            <option value="">-- choose criteria --</option>
            @foreach($criterias as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    @foreach($questions as $qIndex => $q)
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Question {{ $qIndex + 1 }}</h5>
            <button wire:click="removeQuestion({{ $qIndex }})" type="button" class="btn btn-sm btn-outline-danger">
                ✖
            </button>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select wire:model="questions.{{ $qIndex }}.type" class="form-select">
                    <option value="multiple">Multiple Choice</option>
                    <option value="essay">Essay</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Question Text</label>
                <textarea wire:model="questions.{{ $qIndex }}.question_text" class="form-control"
                    placeholder="Enter question..." rows="3"></textarea>
            </div>

            <div x-data="{ type: @entangle('questions.' . $qIndex . '.type') }">
                <template x-if="type === 'multiple'">
                    <div class="border-top pt-3">
                        <h6 class="fw-semibold mb-2">Answers</h6>
                        @foreach($q['answers'] as $aIndex => $a)
                        <div class="row g-2 align-items-center mb-2">
                            <div class="col-md-6">
                                <input type="text"
                                    wire:model="questions.{{ $qIndex }}.answers.{{ $aIndex }}.answer_text"
                                    placeholder="Answer text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <input type="number" wire:model="questions.{{ $qIndex }}.answers.{{ $aIndex }}.point"
                                    placeholder="Point" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <button wire:click="removeAnswer({{ $qIndex }}, {{ $aIndex }})" type="button"
                                    class="btn btn-sm btn-danger w-100">
                                    <i class="bi bi-x-circle"></i> Remove
                                </button>
                            </div>
                        </div>
                        @endforeach
                        <button wire:click="addAnswer({{ $qIndex }})" type="button" class="btn btn-sm btn-success">
                            + Add Answer
                        </button>
                    </div>
                </template>
            </div>

        </div>
    </div>
    @endforeach

    <div class="d-flex gap-2 mt-3">
        <button wire:click="addQuestion" type="button" class="btn btn-primary">
            + Add Question
        </button>
        <button wire:click="save" type="button" class="btn btn-success">
            💾 Save All
        </button>
    </div>
</div>
