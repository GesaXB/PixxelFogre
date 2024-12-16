<?php
namespace App\Livewire;

use App\Models\Projek;
use Livewire\Component;

class ProjekList extends Component
{
    public $kategori; // Variabel untuk kategori aktif
    public $semuaKategori; // Daftar kategori

    public function mount()
    {
        $this->kategori = 'Semua'; // Default kategori
        $this->semuaKategori = Projek::select('kategori')->distinct()->pluck('kategori')->toArray();
    }

    public function filterByKategori($kategori)
    {
        $this->kategori = $kategori;
    }

    public function render()
    {
        $projek = $this->kategori === 'Semua'
            ? Projek::all()
            : Projek::where('kategori', $this->kategori)->get();

        return view('livewire.projek-list', [
            'projek' => $projek,
            'kategoriAktif' => $this->kategori,
        ]);
    }
}