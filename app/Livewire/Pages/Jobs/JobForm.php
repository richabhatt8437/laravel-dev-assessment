<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobListing;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithFileUploads;


class JobForm extends Component
{
    use WithFileUploads;

    public $title, $company_name, $location, $experience, $salary_range, $description, $company_logo;

    public $tags = [], $technologies = [];

    public function mount()
    {
        $this->tags = is_string($this->tags) ? explode(',', $this->tags) : (array) $this->tags;
        $this->technologies = Skill::all();
    }


    protected $rules = [
        'title' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'experience' => 'required|string',
        'salary_range' => 'nullable|string',
        'tags' => 'nullable|string',
        'description' => 'required|string',
        'technologies' => 'nullable|array',
        'company_logo' => 'required|image|max:2048', // 2MB max
    ];

    public function save()
    {
        $this->validate();

        // Handle file upload if exists
        $logoPath = $this->company_logo ? $this->company_logo->store('logos', 'public') : null;

        $tagsJson = json_encode($this->tags);
        $techJson = json_encode($this->technologies);

        JobListing::create([
            'title' => $this->title,
            'company_name' => $this->company_name,
            'location' => $this->location,
            'experience' => $this->experience,
            'salary_range' => $this->salary_range,
            'tags' => $tagsJson,
            'description' => $this->description,
            'technologies' => $techJson,
            'company_logo' => $logoPath,
        ]);



        session()->flash('success', 'Job posting created successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.jobs.job-form');
    }
}