<?php

namespace App\Livewire\Pages\Skills;

use App\Models\Skill;
use Livewire\Component;

class Index extends Component
{

    public array $skills = [];
    public $name, $skill_id;
    public $isEditing = false;

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function mount()
    {
        $this->skills = Skill::all()->toArray();
    }

    public function saveSkill()
    {
        $this->validate();

        Skill::create(['name' => $this->name]);

        $this->reset('name');
        session()->flash('message', 'Skill added successfully.');
    }

    public function editSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $this->skill_id = $skill->id;
        $this->name = $skill->name;
        $this->isEditing = true;
    }

    public function updateSkill()
    {
        $this->validate();

        Skill::where('id', $this->skill_id)->update(['name' => $this->name]);

        $this->reset(['name', 'skill_id', 'isEditing']);
        session()->flash('message', 'Skill updated successfully.');
    }

    public function deleteSkill($id)
    {
        Skill::findOrFail($id)->delete();
        session()->flash('message', 'Skill deleted successfully.');
    }

    public function render()
    {
        return view('livewire.pages.skills.index');

    }
}