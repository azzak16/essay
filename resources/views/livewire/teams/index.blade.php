<div class="container py-4">

    <h3 class="mb-4">Teams</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FORM --}}
    <div class="card mb-4">
        <div class="card-header">
            {{ $isEditing ? 'Edit Team' : 'Add Team' }}
        </div>

        <div class="card-body">
            <form wire:submit.prevent="save">

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" wire:model="name" class="form-control">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" wire:model="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" wire:model="image" class="form-control">
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail mt-2" width="120">
                    @endif
                </div>

                <button class="btn btn-primary">
                    {{ $isEditing ? 'Update' : 'Save' }}
                </button>

                @if($isEditing)
                    <button type="button" wire:click="cancel" class="btn btn-secondary">
                        Cancel
                    </button>
                @endif

            </form>
        </div>
    </div>


    {{-- TABLE --}}
    <div class="card">
        <div class="card-header">
            List
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $a)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->title }}</td>
                            <td>{{ $a->name }}</td>
                            <td>
                                @if($a->image)
                                    <img src="{{ asset('storage/'.$a->image) }}" width="80" class="img-thumbnail">
                                @endif
                            </td>
                            <td>
                                <button wire:click="edit({{ $a->id }})"
                                    class="btn btn-warning btn-sm">Edit</button>

                                <button wire:click="delete({{ $a->id }})"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete?')">
                                    Delete
                                </button>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No teams found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
