<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class FormKelas extends Component
{
    public $nama, $level, $selectedLevel, $kelas_id, $data;
    public $updateMode = false;

    protected $rules = [
        'nama' => 'required',
        'selectedLevel' => 'required',
    ];

    public function mount()
    {
        switch (env('JENJANG_SEKOLAH')) {
            case 'sma':
                $level = ['10' => '10', '11' => '11', '12' => '12'];
                $this->level = $level;
                break;
            case 'smp':
                $level = ['7' => '7', '8' => '8', '9' => '9'];
                $this->level = $level;
                break;
            case 'sd':
                $level = ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'];
                $this->level = $level;
                break;
            case 'tk':
                $level = ['a' => 'a', 'b' => 'b'];
                $this->level = $level;
                break;
        }
    }

    public function render()
    {
        
        return view('livewire.kelas.form-kelas');
    }

    private function resetInputFields(){
        $this->nama = '';
        $this->selectedLevel = '';
    }

    public function store()
    {
        $this->validate();

        $data = [
            'nama' => $this->nama,
            'level' => $this->selectedLevel,
        ];

        // dd($data);

        Kelas::create($data);

        // session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('kelasAdded'); // Close model to using to jquery
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $data = Kelas::where('id',$id)->first();
        $this->kelas_id = $id;
        $this->nama = $data->name;
        $this->selectedLevel = $data->selectedLevel;
    }
}
