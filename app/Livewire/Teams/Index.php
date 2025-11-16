<?php

namespace App\Livewire\Teams;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $teams;
    public $team_id;
    public $name;
    public $title;
    public $image;
    public $isEditing = false;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->teams = Team::latest()->get();
    }

    public function save()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $data['image'] = $this->image->store('teams', 'public');
        }

        if ($this->isEditing) {
            $team = Team::findOrFail($this->team_id);
            $team->update($data);

            session()->flash('success', 'Team updated successfully');

        } else {
            Team::create($data);
            session()->flash('success', 'Team added successfully');
        }

        $this->cancel();
        $this->loadData();
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        $this->team_id  = $team->id;
        $this->name         = $team->name;
        $this->title  = $team->title;
        $this->image        = null;

        $this->isEditing = true;
    }

    public function delete($id)
    {
        Team::findOrFail($id)->delete();
        $this->loadData();
        session()->flash('success', 'Team deleted!');
    }

    public function cancel()
    {
        $this->reset(['name','title','image','team_id']);
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.teams.index');
    }
}

