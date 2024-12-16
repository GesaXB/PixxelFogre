<head>
    <link rel="stylesheet" href="css/projek.css">
</head>

<div class="projects-section">
    <h2 class="section-title">Our Projects</h2>

    <div class="filter-buttons">
        <!-- Tombol All -->
        <button wire:click="filterByKategori('Semua')" 
                class="{{ $kategoriAktif === 'Semua' ? 'active' : '' }}">
            All
        </button>
    
        <!-- Tombol Berdasarkan Kategori -->
        @foreach ($semuaKategori as $kategori)
            <button wire:click="filterByKategori('{{ $kategori->id }}')" 
                    class="{{ $kategoriAktif == $kategori->id ? 'active' : '' }}">
                {{ $kategori->nama }}
            </button>
        @endforeach
    </div>
    

    <!-- Projects Gallery -->
    <div class="projects-gallery">
        @forelse ($projek as $item)
            <div class="project-item" data-category="{{ $item->kategori->nama ?? 'Uncategorized' }}">
                <img src="{{ asset('storage/' . $item->foto) }}" alt="Image" class="project-image">
                <div class="project-details">
                    <h3 class="project-name">{{ $item->nama }}</h3>
                    <p class="project-description">{{ $item->deskripsi }}</p>
                    <p class="project-description">{{ $item->kategori->nama }}</p>
                </div>
            </div>
        @empty
            <p>No projects available in this category.</p>
        @endforelse
    </div>
</div>
