<?php
namespace App\Livewire;

use App\Models\Projek;
use App\Models\Kategori;
use Livewire\Component;

class ProjekList extends Component
{
    public $kategoriAktif = 'Semua'; // Default kategori
    public $semuaKategori;

    public function mount()
    {
        $this->semuaKategori = Kategori::all(); // Ambil semua kategori
    }

    public function filterByKategori($kategoriId)
    {
        $this->kategoriAktif = $kategoriId;
    }

    public function render()
    {
        $projek = $this->kategoriAktif === 'Semua'
            ? Projek::with('kategori')->get() // Ambil semua projek
            : Projek::with('kategori')->where('kategori_id', $this->kategoriAktif)->get(); // Filter projek

        return view('livewire.projek-list', [
            'projek' => $projek,
            'semuaKategori' => $this->semuaKategori,
            'kategoriAktif' => $this->kategoriAktif,
        ]);
    }
}
