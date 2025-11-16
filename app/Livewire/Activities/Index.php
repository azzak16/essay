<?php

namespace App\Livewire\Activities;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Activity;

class Index extends Component
{
    use WithFileUploads;

    public $activities;
    public $activity_id;
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
        $this->activities = Activity::latest()->get();
    }

    public function save()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $data['image'] = $this->image->store('activities', 'public');
        }

        if ($this->isEditing) {
            $activity = Activity::findOrFail($this->activity_id);
            $activity->update($data);

            session()->flash('success', 'Activity updated successfully');

        } else {
            Activity::create($data);
            session()->flash('success', 'Activity added successfully');
        }

        $this->cancel();
        $this->loadData();
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);

        $this->activity_id  = $activity->id;
        $this->name         = $activity->name;
        $this->description  = $activity->description;
        $this->date         = $activity->date;
        $this->image        = null;

        $this->isEditing = true;
    }

    public function delete($id)
    {
        Activity::findOrFail($id)->delete();
        $this->loadData();
        session()->flash('success', 'Activity deleted!');
    }

    public function cancel()
    {
        $this->reset(['name','description','date','image','activity_id']);
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.activities.index');
    }
}
