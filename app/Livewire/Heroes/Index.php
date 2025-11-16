<?php

namespace App\Livewire\Heroes;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Hero;

class Index extends Component
{
    use WithFileUploads;

    public $heroes;
    public $hero_id;
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
        $this->heroes = Hero::latest()->get();
    }

    public function save()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $data['image'] = $this->image->store('heroes', 'public');
        }

        if ($this->isEditing) {
            $hero = Hero::findOrFail($this->hero_id);
            $hero->update($data);

            session()->flash('success', 'Hero updated successfully');

        } else {
            Hero::create($data);
            session()->flash('success', 'Hero added successfully');
        }

        $this->cancel();
        $this->loadData();
    }

    public function edit($id)
    {
        $hero = Hero::findOrFail($id);

        $this->hero_id  = $hero->id;
        $this->name         = $hero->name;
        $this->description  = $hero->description;
        $this->image        = null;

        $this->isEditing = true;
    }

    public function delete($id)
    {
        Hero::findOrFail($id)->delete();
        $this->loadData();
        session()->flash('success', 'Hero deleted!');
    }

    public function cancel()
    {
        $this->reset(['name','description','image','hero_id']);
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.heroes.index');
    }
}
