<div class="container py-4">
    <h2 class="mb-4">Jawab Soal Berdasarkan Kriteria</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="mb-3">
        <label for="criteria" class="form-label">Pilih Kriteria</label>
        <select wire:model="criteria_id" id="criteria" class="form-select">
            <option value="">-- Pilih Kriteria --</option>
            @foreach($criterias as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    @if($criteria_id)
        <form wire:submit.prevent="save">
            <div class="card mb-3">
                <div class="card-body">
                    @forelse($questions as $q)
                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ $loop->iteration }}. {{ $q->question_text }}</label>

                            @if ($q->type === 'essay')
                                <textarea wire:model.defer="answers.{{ $q->id }}" class="form-control" rows="3"></textarea>
                            @elseif ($q->type === 'multiple_choice')
                                @foreach (json_decode($q->options, true) as $opt)
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="answers_{{ $q->id }}"
                                            wire:model.defer="answers.{{ $q->id }}"
                                            value="{{ $opt }}">
                                        <label class="form-check-label">{{ $opt }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @empty
                        <p class="text-muted">Tidak ada soal untuk kriteria ini.</p>
                    @endforelse
                </div>
            </div>

            @if(count($questions) > 0)
                <button type="submit" class="btn btn-primary">Simpan Jawaban</button>
            @endif
        </form>
    @endif
</div>
