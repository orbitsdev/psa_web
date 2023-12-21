<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DataCollection;

class DashboardMap extends Component
{
    public $dataCollection;
    public $lat;
    public $lng;
    public function mount()
    {
        $this->dataCollection = DataCollection::all();
        $this->lat = 14.5995;
        $this->lng = 120.9842;
    }

    public function fetchData()
    {
      // Retrieve data from your model (adjust as needed)

        //$this->emit('dataFetched', $dataCollection->toArray()); // Emit the fetched data to the blade file
    }

    public function render()
    {
        return view('livewire.dashboard-map');
    }
}
