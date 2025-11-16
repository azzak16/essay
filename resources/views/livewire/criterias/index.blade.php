<?php

use Livewire\Volt\Component;
use App\Models\Criteria;

new class extends Component {
    public $criterias, $name, $description, $criteria_id;
    public $isEdit = false;

    public function mount()
    {
        $this->criterias = Criteria::all();
    }

    public function store()
    {
        $this->validate(['name' => 'required|string|max:255']);

        Criteria::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetForm();
        $this->criterias = Criteria::all();
        session()->flash('message', 'Criteria added!');
    }

    public function edit($id)
    {
        $criteria = Criteria::findOrFail($id);
        $this->criteria_id = $criteria->id;
        $this->name = $criteria->name;
        $this->description = $criteria->description;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate(['name' => 'required|string|max:255']);
        $criteria = Criteria::findOrFail($this->criteria_id);
        $criteria->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetForm();
        $this->criterias = Criteria::all();
        session()->flash('message', 'Criteria updated!');
    }

    public function delete($id)
    {
        Criteria::findOrFail($id)->delete();
        $this->criterias = Criteria::all();
        session()->flash('message', 'Deleted!');
    }

    public function resetForm()
    {
        $this->name = $this->description = '';
        $this->criteria_id = null;
        $this->isEdit = false;
    }
};
?>

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h4 mb-4 fw-bold">Master Criteria</h2>

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="mb-4">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" wire:model="name" class="form-control" placeholder="Enter name">
                    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea wire:model="description" class="form-control" placeholder="Enter description" rows="3"></textarea>
                    @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ $isEdit ? 'Update' : 'Save' }}
                    </button>
                    @if ($isEdit)
                        <button type="button" wire:click="resetForm" class="btn btn-secondary">Cancel</button>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center" style="width: 50px;">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-center" style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($criterias as $i => $c)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->description }}</td>
                            <td class="text-center">
                                <button wire:click="edit({{ $c->id }})" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <button wire:click="delete({{ $c->id }})" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

