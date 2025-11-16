<?php

namespace App\Livewire\Layanans;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Layanan;

class Index extends Component
{
    use WithFileUploads;

    public $layanans;
    public $layanan_id;
    public $name;
    public $description;
    public $date;
    public $image;
    public $isEditing = false;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->layanans = Layanan::latest()->get();
    }

    public function save()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $data['image'] = $this->image->store('layanans', 'public');
        }

        if ($this->isEditing) {
            $layanan = Layanan::findOrFail($this->layanan_id);
            $layanan->update($data);

            session()->flash('success', 'Layanan updated successfully');

        } else {
            Layanan::create($data);
            session()->flash('success', 'Layanan added successfully');
        }

        $this->cancel();
        $this->loadData();
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);

        $this->layanan_id  = $layanan->id;
        $this->name         = $layanan->name;
        $this->description  = $layanan->description;
        $this->image        = null;

        $this->isEditing = true;
    }

    public function delete($id)
    {
        Layanan::findOrFail($id)->delete();
        $this->loadData();
        session()->flash('success', 'Layanan deleted!');
    }

    public function cancel()
    {
        $this->reset(['name','description','image','layanan_id']);
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.layanans.index');
    }
}
