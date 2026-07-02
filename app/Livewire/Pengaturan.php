<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting;

class Pengaturan extends Component
{
    public $activeTab = 'toko';

    public $company_name = '';
    public $company_phone = '';
    public $company_email = '';
    public $company_address = '';

    public $saving = false;

    protected function rules()
    {
        return [
            'company_name' => 'required|string|max:255',
            'company_phone' => 'nullable|string|max:50',
            'company_email' => 'nullable|email|max:255',
            'company_address' => 'nullable|string|max:1000',
        ];
    }

    protected function getListeners()
    {
        return ['notify'];
    }

    public function mount()
    {
        $this->company_name = Setting::get('company_name', '');
        $this->company_phone = Setting::get('company_phone', '');
        $this->company_email = Setting::get('company_email', '');
        $this->company_address = Setting::get('company_address', '');
    }

    public function save()
    {
        $this->validate();

        $this->saving = true;

        Setting::set('company_name', $this->company_name);
        Setting::set('company_phone', $this->company_phone);
        Setting::set('company_email', $this->company_email);
        Setting::set('company_address', $this->company_address);

        $this->saving = false;

        $this->dispatch('notify', type: 'success', message: 'Pengaturan berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pengaturan');
    }
}
