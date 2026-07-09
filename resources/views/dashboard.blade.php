<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">
                Dashboard Admin
            </h2>
        </div>
    </x-slot>

    <div class="container py-4">

        <div class="row">

            <div class="col-md-3 mb-4">

                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <h1>📚</h1>

                        <h5>Buku</h5>

                        <a href="{{ route('buku.index') }}"
                           class="btn btn-primary w-100">
                            Kelola
                        </a>

                    </div>
                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card shadow border-0">
                    <div class="card-body text-center">

                        <h1>📂</h1>

                        <h5>Kategori</h5>

                        <a href="{{ route('kategori.index') }}"
                           class="btn btn-success w-100">
                            Kelola
                        </a>

                    </div>
                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card shadow border-0">

                    <div class="card-body text-center">

                        <h1>📦</h1>

                        <h5>Pesanan</h5>

                        <button class="btn btn-warning w-100">

                            Kelola

                        </button>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card shadow border-0">

                    <div class="card-body text-center">

                        <h1>👤</h1>

                        <h5>{{ Auth::user()->name }}</h5>

                        <small>Administrator</small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>