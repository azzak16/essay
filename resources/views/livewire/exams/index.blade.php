<?php

use Livewire\Volt\Component;
use App\Models\Criteria;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public $criteria_id;
    public $questions = [];
    public $answers = [];

    // ✅ Gunakan computed property, bukan render()
    public function getCriteriasProperty()
    {
        return Criteria::all();
    }

    public function updatedCriteriaId()
    {
        $this->loadQuestions();
    }

    public function loadQuestions()
    {
        $this->questions = Question::where('criteria_id', $this->criteria_id)
            ->with('answers') // penting agar multiple choice bisa tampil
            ->get();

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
};
?>

<div class="container py-4">
    <h2 class="mb-4 fw-bold">Jawab Soal Berdasarkan Kriteria</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="mb-3">
        <label class="form-label">Pilih Kriteria</label>
        <select wire:model="criteria_id" class="form-select">
            <option value="">-- Pilih Kriteria --</option>
            @foreach($this->criterias as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    @if($criteria_id)
        <form wire:submit.prevent="save">
            @forelse($questions as $q)
                <div class="mb-4">
                    <label class="form-label fw-semibold">{{ $loop->iteration }}. {{ $q->question_text }}</label>

                    @if ($q->type === 'essay')
                        <textarea wire:model.defer="answers.{{ $q->id }}" class="form-control" rows="3"></textarea>
                    @elseif ($q->type === 'multiple')
                        @foreach ($q->answers as $opt)
                            <div class="form-check">
                                <input
                                    type="radio"
                                    class="form-check-input"
                                    id="answer_{{ $q->id }}_{{ $opt->id }}"
                                    wire:model.defer="answers.{{ $q->id }}"
                                    value="{{ $opt->answer_text }}"
                                >
                                <label for="answer_{{ $q->id }}_{{ $opt->id }}" class="form-check-label">
                                    {{ $opt->answer_text }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            @empty
                <p class="text-muted">Tidak ada soal untuk kriteria ini.</p>
            @endforelse

            @if(count($questions) > 0)
                <button type="submit" class="btn btn-primary mt-3">Simpan Jawaban</button>
            @endif
        </form>
    @endif
</div>
