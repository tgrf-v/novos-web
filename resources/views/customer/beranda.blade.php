<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novos — Custom Sports Jersey</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { font-family: 'Poppins', sans-serif; }
        .mesh-texture {
            background-image:
                radial-gradient(circle, rgba(255,255,255,0.04) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .step-connector {
            position: absolute;
            top: 46px;
            left: calc(50% + 28px);
            width: calc(100% - 56px);
            height: 0;
            border-top: 2px dashed #1a237e;
            z-index: 0;
        }
        .step-item:last-child .step-connector { display: none; }
        .product-card-shadow { box-shadow: 0 1px 3px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.06); }
        .product-card-shadow:hover { box-shadow: 0 10px 25px rgba(0,0,0,0.1), 0 4px 10px rgba(0,0,0,0.06); }
        .testimonial-shadow { box-shadow: 0 1px 3px rgba(0,0,0,0.06); }
        .testimonial-shadow:hover { box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        .carousel-dot-active { width: 24px; height: 8px; border-radius: 4px; background: #00e5ff; }
        .carousel-dot-inactive { width: 8px; height: 8px; border-radius: 50%; border: 1.5px solid white; background: transparent; }
        .glow-cyan { box-shadow: 0 0 12px rgba(0,229,255,0.5); }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-[#f5f5f5] text-[#212121] antialiased">

<div class="w-full max-w-[1440px] mx-auto bg-white">

    {{-- ============================================================ --}}
    {{-- NAVBAR --}}
    {{-- ============================================================ --}}
    <nav class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[1440px] h-16 bg-white shadow-[0_1px_4px_rgba(0,0,0,0.06)] z-50">
        <div class="max-w-[1200px] mx-auto px-6 h-full flex items-center justify-between">
            {{-- Left: Logo --}}
            <a href="#" class="text-[#1a237e] text-2xl font-extrabold tracking-tight">NOVOS</a>

            {{-- Center: Nav links --}}
            <div class="flex items-center gap-8">
                <a href="#" class="text-sm font-semibold text-[#1a237e] relative pb-1 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2.5px] after:bg-[#00e5ff] after:rounded-full">Beranda</a>
                <a href="#" class="text-sm font-medium text-[#616161] hover:text-[#1a237e] transition-colors">Tentang Kami</a>
                <a href="#" class="text-sm font-medium text-[#616161] hover:text-[#1a237e] transition-colors">Katalog</a>
                <a href="#" class="text-sm font-medium text-[#616161] hover:text-[#1a237e] transition-colors">Buat Pesanan</a>
            </div>

            {{-- Right: Profile + Masuk --}}
            <div class="flex items-center gap-3">
                <svg class="w-8 h-8 text-[#9e9e9e] cursor-pointer hover:text-[#1a237e] transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <button class="px-5 py-2 text-sm font-semibold text-[#1a237e] border-2 border-[#1a237e] rounded-[4px] hover:bg-[#1a237e] hover:text-white transition-all">Masuk</button>
            </div>
        </div>
    </nav>

    {{-- ============================================================ --}}
    {{-- SECTION 1 — HERO BANNER --}}
    {{-- ============================================================ --}}
    <section class="relative mt-16 w-full h-[560px] bg-gradient-to-br from-[#1a237e] to-[#0d0d2b] mesh-texture overflow-hidden">
        {{-- Subtle overlay pattern --}}
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMiI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyek0zNiAyNHYySDI0di0yaDEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-30"></div>

        <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-6">
            {{-- Label chip --}}
            <div class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-[#1a237e]/60 backdrop-blur-sm border border-[#00e5ff]/20 mb-6">
                <span class="text-sm">✦</span>
                <span class="text-sm font-medium text-[#00e5ff]">Jersey Olahraga Custom Berkualitas</span>
            </div>

            {{-- Headline --}}
            <h1 class="text-[56px] font-extrabold leading-tight text-white mb-5">Pesan Jersey Custom Impianmu</h1>

            {{-- Subtext --}}
            <p class="text-lg text-[#b0bec5] font-normal max-w-[640px] mb-8">Desain bebas, kualitas premium, pengerjaan cepat dan tepat waktu</p>

            {{-- CTA row --}}
            <div class="flex items-center gap-3">
                <a href="#" class="px-8 py-3 bg-[#00e5ff] text-[#1a237e] font-bold text-sm rounded-[4px] hover:bg-[#00d2e8] transition-all shadow-lg shadow-[#00e5ff]/20">Buat Pesanan Sekarang</a>
                <a href="#" class="px-8 py-3 border-2 border-white text-white font-semibold text-sm rounded-[4px] hover:bg-white/10 transition-all">Lihat Katalog</a>
            </div>
        </div>

        {{-- Carousel dots --}}
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2">
            <span class="carousel-dot-active"></span>
            <span class="carousel-dot-inactive"></span>
            <span class="carousel-dot-inactive"></span>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 2 — PRODUK UNGGULAN --}}
    {{-- ============================================================ --}}
    <section class="bg-white py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            {{-- Header --}}
            <div class="mb-10">
                <p class="text-[12px] font-semibold text-[#00e5ff] tracking-[0.2em] uppercase mb-2">Koleksi Kami</p>
                <h2 class="text-4xl font-bold text-[#1a237e] mb-2">Produk Unggulan</h2>
                <p class="text-[#757575]">Jersey terlaris pilihan customer kami</p>
            </div>

            {{-- Products row --}}
            <div class="flex gap-6 overflow-x-auto pb-4">
                {{-- Product Card 1 --}}
                <div class="min-w-[280px] w-[280px] bg-white rounded-[8px] product-card-shadow transition-all duration-300 overflow-hidden">
                    <div class="relative aspect-[4/3] bg-[#e0e0e0] flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#bdbdbd]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>
                        <span class="absolute top-3 left-3 px-3 py-1 bg-[#1a237e] text-white text-[11px] font-semibold rounded-[6px]">Sepak Bola</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-[#1a237e] mb-1">Jersey Tim Premium</h3>
                        <p class="text-xs text-[#9e9e9e] mb-3">Mulai dari</p>
                        <p class="text-xl font-bold text-[#1a237e] mb-4">Rp 150.000</p>
                        <button class="w-full py-2.5 border-2 border-[#1a237e] text-[#1a237e] font-semibold text-sm rounded-[4px] hover:bg-[#1a237e] hover:text-white transition-all">Pesan Sekarang</button>
                    </div>
                </div>

                {{-- Product Card 2 --}}
                <div class="min-w-[280px] w-[280px] bg-white rounded-[8px] product-card-shadow transition-all duration-300 overflow-hidden">
                    <div class="relative aspect-[4/3] bg-[#e0e0e0] flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#bdbdbd]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>
                        <span class="absolute top-3 left-3 px-3 py-1 bg-[#1a237e] text-white text-[11px] font-semibold rounded-[6px]">Basket</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-[#1a237e] mb-1">Jersey Basket Pro</h3>
                        <p class="text-xs text-[#9e9e9e] mb-3">Mulai dari</p>
                        <p class="text-xl font-bold text-[#1a237e] mb-4">Rp 175.000</p>
                        <button class="w-full py-2.5 border-2 border-[#1a237e] text-[#1a237e] font-semibold text-sm rounded-[4px] hover:bg-[#1a237e] hover:text-white transition-all">Pesan Sekarang</button>
                    </div>
                </div>

                {{-- Product Card 3 --}}
                <div class="min-w-[280px] w-[280px] bg-white rounded-[8px] product-card-shadow transition-all duration-300 overflow-hidden">
                    <div class="relative aspect-[4/3] bg-[#e0e0e0] flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#bdbdbd]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>
                        <span class="absolute top-3 left-3 px-3 py-1 bg-[#1a237e] text-white text-[11px] font-semibold rounded-[6px]">Futsal</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-[#1a237e] mb-1">Jersey Futsal Elite</h3>
                        <p class="text-xs text-[#9e9e9e] mb-3">Mulai dari</p>
                        <p class="text-xl font-bold text-[#1a237e] mb-4">Rp 135.000</p>
                        <button class="w-full py-2.5 border-2 border-[#1a237e] text-[#1a237e] font-semibold text-sm rounded-[4px] hover:bg-[#1a237e] hover:text-white transition-all">Pesan Sekarang</button>
                    </div>
                </div>

                {{-- Product Card 4 --}}
                <div class="min-w-[280px] w-[280px] bg-white rounded-[8px] product-card-shadow transition-all duration-300 overflow-hidden">
                    <div class="relative aspect-[4/3] bg-[#e0e0e0] flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#bdbdbd]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>
                        <span class="absolute top-3 left-3 px-3 py-1 bg-[#1a237e] text-white text-[11px] font-semibold rounded-[6px]">Custom</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-[#1a237e] mb-1">Jersey Custom Full</h3>
                        <p class="text-xs text-[#9e9e9e] mb-3">Mulai dari</p>
                        <p class="text-xl font-bold text-[#1a237e] mb-4">Rp 200.000</p>
                        <button class="w-full py-2.5 border-2 border-[#1a237e] text-[#1a237e] font-semibold text-sm rounded-[4px] hover:bg-[#1a237e] hover:text-white transition-all">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 3 — CARA PEMESANAN --}}
    {{-- ============================================================ --}}
    <section class="bg-[#f5f5f5] py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            {{-- Header --}}
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-[#1a237e] mb-2">Cara Pemesanan</h2>
                <p class="text-[#757575]">Proses mudah dalam 5 langkah</p>
            </div>

            {{-- Steps --}}
            <div class="flex justify-between items-start relative">
                {{-- Connector line --}}
                <div class="absolute top-[46px] left-[56px] right-[56px] h-0 border-t-2 border-dashed border-[#1a237e]/20 z-0"></div>

                {{-- Step 1 (Completed) --}}
                <div class="step-item flex flex-col items-center text-center relative z-10 w-[140px]">
                    <span class="text-[10px] font-semibold text-[#00e5ff] uppercase tracking-wider mb-1">Langkah 1</span>
                    <div class="w-14 h-14 rounded-full bg-[#1a237e] flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-[#1a237e] mb-1">Buat Pesanan</p>
                    <p class="text-xs text-[#757575] leading-tight">Isi form & upload desain kamu</p>
                </div>

                {{-- Step 2 (Completed) --}}
                <div class="step-item flex flex-col items-center text-center relative z-10 w-[140px]">
                    <span class="text-[10px] font-semibold text-[#00e5ff] uppercase tracking-wider mb-1">Langkah 2</span>
                    <div class="w-14 h-14 rounded-full bg-[#1a237e] flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-[#1a237e] mb-1">Pembayaran</p>
                    <p class="text-xs text-[#757575] leading-tight">Bayar dp atau lunas via transfer</p>
                </div>

                {{-- Step 3 (Active) --}}
                <div class="step-item flex flex-col items-center text-center relative z-10 w-[140px]">
                    <span class="text-[10px] font-semibold text-[#00e5ff] uppercase tracking-wider mb-1">Langkah 3</span>
                    <div class="w-14 h-14 rounded-full bg-[#1a237e] flex items-center justify-center mb-3 glow-cyan ring-2 ring-[#00e5ff]">
                        <svg class="w-6 h-6 text-[#00e5ff]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-[#1a237e] mb-1">Verifikasi Admin</p>
                    <p class="text-xs text-[#757575] leading-tight">Admin cek & konfirmasi pesanan</p>
                </div>

                {{-- Step 4 (Default) --}}
                <div class="step-item flex flex-col items-center text-center relative z-10 w-[140px]">
                    <span class="text-[10px] font-semibold text-[#00e5ff] uppercase tracking-wider mb-1">Langkah 4</span>
                    <div class="w-14 h-14 rounded-full bg-[#1a237e] flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-[#1a237e] mb-1">ACC Desain</p>
                    <p class="text-xs text-[#757575] leading-tight">Setujui desain final dari tim</p>
                </div>

                {{-- Step 5 (Default) --}}
                <div class="step-item flex flex-col items-center text-center relative z-10 w-[140px]">
                    <span class="text-[10px] font-semibold text-[#00e5ff] uppercase tracking-wider mb-1">Langkah 5</span>
                    <div class="w-14 h-14 rounded-full bg-[#1a237e] flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-[#1a237e] mb-1">Produksi & Selesai</p>
                    <p class="text-xs text-[#757575] leading-tight">Diproduksi & dikirim ke kamu</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 4 — STATS BANNER --}}
    {{-- ============================================================ --}}
    <section class="bg-[#1a237e] py-12">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="flex justify-between items-start">
                {{-- Stat 1 --}}
                <div class="flex-1 text-center">
                    <div class="w-8 h-[3px] bg-[#00e5ff] mx-auto mb-4"></div>
                    <p class="text-5xl font-bold text-white mb-1">500+</p>
                    <p class="text-sm text-[#00e5ff] font-medium">Pesanan Selesai</p>
                </div>

                {{-- Divider --}}
                <div class="w-px h-20 bg-[#00e5ff]/20 self-center"></div>

                {{-- Stat 2 --}}
                <div class="flex-1 text-center">
                    <div class="w-8 h-[3px] bg-[#00e5ff] mx-auto mb-4"></div>
                    <p class="text-5xl font-bold text-white mb-1">50+</p>
                    <p class="text-sm text-[#00e5ff] font-medium">Desain Tersedia</p>
                </div>

                {{-- Divider --}}
                <div class="w-px h-20 bg-[#00e5ff]/20 self-center"></div>

                {{-- Stat 3 --}}
                <div class="flex-1 text-center">
                    <div class="w-8 h-[3px] bg-[#00e5ff] mx-auto mb-4"></div>
                    <p class="text-5xl font-bold text-white mb-1">4.9★</p>
                    <p class="text-sm text-[#00e5ff] font-medium">Rating Customer</p>
                </div>

                {{-- Divider --}}
                <div class="w-px h-20 bg-[#00e5ff]/20 self-center"></div>

                {{-- Stat 4 --}}
                <div class="flex-1 text-center">
                    <div class="w-8 h-[3px] bg-[#00e5ff] mx-auto mb-4"></div>
                    <p class="text-5xl font-bold text-white mb-1">3-7 Hari</p>
                    <p class="text-sm text-[#00e5ff] font-medium">Waktu Pengerjaan</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- SECTION 5 — TESTIMONI --}}
    {{-- ============================================================ --}}
    <section class="bg-white py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            {{-- Header --}}
            <h2 class="text-4xl font-bold text-[#1a237e] text-center mb-14">Apa Kata Mereka?</h2>

            {{-- Testimonial cards --}}
            <div class="flex gap-6">
                {{-- Card 1 --}}
                <div class="flex-1 bg-white rounded-[8px] border border-[#e5e7eb] p-6 testimonial-shadow transition-all duration-300">
                    {{-- Stars --}}
                    <div class="flex items-center gap-0.5 mb-4">
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    {{-- Quote --}}
                    <p class="text-sm text-[#616161] italic leading-relaxed mb-5">&ldquo;Jerseynya bagus banget, bahan adem dan jahitannya rapi. Desain sesuai request. Pasti order lagi!&rdquo;</p>
                    {{-- Divider --}}
                    <div class="border-t border-[#e5e7eb] pt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#e0e0e0] flex-shrink-0"></div>
                        <div>
                            <p class="text-sm font-bold text-[#212121]">Rina A.</p>
                            <p class="text-xs text-[#9e9e9e]">Customer Novos</p>
                        </div>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="flex-1 bg-white rounded-[8px] border border-[#e5e7eb] p-6 testimonial-shadow transition-all duration-300">
                    {{-- Stars --}}
                    <div class="flex items-center gap-0.5 mb-4">
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    {{-- Quote --}}
                    <p class="text-sm text-[#616161] italic leading-relaxed mb-5">&ldquo;Proses cepat banget, 5 hari jadi. Komunikasi dengan admin juga responsif. Recommended!&rdquo;</p>
                    {{-- Divider --}}
                    <div class="border-t border-[#e5e7eb] pt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#e0e0e0] flex-shrink-0"></div>
                        <div>
                            <p class="text-sm font-bold text-[#212121]">Dimas P.</p>
                            <p class="text-xs text-[#9e9e9e]">Customer Novos</p>
                        </div>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="flex-1 bg-white rounded-[8px] border border-[#e5e7eb] p-6 testimonial-shadow transition-all duration-300">
                    {{-- Stars --}}
                    <div class="flex items-center gap-0.5 mb-4">
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="w-4 h-4 text-[#00e5ff] fill-[#00e5ff]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    {{-- Quote --}}
                    <p class="text-sm text-[#616161] italic leading-relaxed mb-5">&ldquo;Hasil jahitan rapi, sablon nempel kuat, warna sesuai mockup. Tim Novos profesional banget.&rdquo;</p>
                    {{-- Divider --}}
                    <div class="border-t border-[#e5e7eb] pt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#e0e0e0] flex-shrink-0"></div>
                        <div>
                            <p class="text-sm font-bold text-[#212121]">Sari W.</p>
                            <p class="text-xs text-[#9e9e9e]">Customer Novos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- FOOTER --}}
    {{-- ============================================================ --}}
    <footer class="bg-[#0d0d2b] pt-[60px] pb-6">
        <div class="max-w-[1200px] mx-auto px-6">
            {{-- 4 columns --}}
            <div class="flex gap-12 mb-12">
                {{-- Col 1: Brand --}}
                <div class="flex-1 max-w-[280px]">
                    <p class="text-white text-2xl font-extrabold tracking-tight mb-4">NOVOS</p>
                    <p class="text-sm text-[#9e9e9e] leading-relaxed mb-6">Custom Sports Jersey — Desain bebas, kualitas premium, pengerjaan cepat dan tepat waktu.</p>
                    <div class="flex items-center gap-3">
                        {{-- WhatsApp --}}
                        <a href="#" class="w-9 h-9 rounded-full border border-[#00e5ff]/40 flex items-center justify-center text-[#00e5ff] hover:bg-[#00e5ff] hover:text-[#0d0d2b] transition-all">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.75 12a9.75 9.75 0 01-14.55 8.393l-3.45 1.157 1.157-3.45A9.75 9.75 0 1121.75 12z" />
                                <path d="M15.75 13.5a.75.75 0 100-1.5.75.75 0 000 1.5zM12 13.5a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                            </svg>
                        </a>
                        {{-- Instagram --}}
                        <a href="#" class="w-9 h-9 rounded-full border border-[#00e5ff]/40 flex items-center justify-center text-[#00e5ff] hover:bg-[#00e5ff] hover:text-[#0d0d2b] transition-all">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <circle cx="12" cy="12" r="4.5" />
                                <circle cx="17.5" cy="6.5" r="1" />
                            </svg>
                        </a>
                        {{-- Email --}}
                        <a href="#" class="w-9 h-9 rounded-full border border-[#00e5ff]/40 flex items-center justify-center text-[#00e5ff] hover:bg-[#00e5ff] hover:text-[#0d0d2b] transition-all">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Col 2: Menu --}}
                <div class="flex-1">
                    <p class="text-white font-bold text-sm mb-5">Menu</p>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-sm text-[#bdbdbd] hover:text-[#00e5ff] transition-colors">Beranda</a></li>
                        <li><a href="#" class="text-sm text-[#bdbdbd] hover:text-[#00e5ff] transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-sm text-[#bdbdbd] hover:text-[#00e5ff] transition-colors">Katalog</a></li>
                        <li><a href="#" class="text-sm text-[#bdbdbd] hover:text-[#00e5ff] transition-colors">Buat Pesanan</a></li>
                    </ul>
                </div>

                {{-- Col 3: Kontak --}}
                <div class="flex-1">
                    <p class="text-white font-bold text-sm mb-5">Kontak</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-[#00e5ff] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <span class="text-sm text-[#bdbdbd]">+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-[#00e5ff] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <span class="text-sm text-[#bdbdbd]">hello@novosjersey.com</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-[#00e5ff] flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <circle cx="12" cy="12" r="4.5" />
                                <circle cx="17.5" cy="6.5" r="1" />
                            </svg>
                            <span class="text-sm text-[#bdbdbd]">@novosjersey</span>
                        </li>
                    </ul>
                </div>

                {{-- Col 4: Jam Operasional --}}
                <div class="flex-1">
                    <p class="text-white font-bold text-sm mb-5">Jam Operasional</p>
                    <ul class="space-y-3">
                        <li class="flex justify-between text-sm">
                            <span class="text-[#bdbdbd]">Sen - Jum</span>
                            <span class="text-white font-medium">08.00 - 17.00</span>
                        </li>
                        <li class="flex justify-between text-sm">
                            <span class="text-[#bdbdbd]">Sabtu</span>
                            <span class="text-white font-medium">08.00 - 13.00</span>
                        </li>
                        <li class="flex justify-between text-sm">
                            <span class="text-[#bdbdbd]">Minggu</span>
                            <span class="text-[#9e9e9e]">Libur</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom bar --}}
            <div class="border-t border-[#ffffff]/10 pt-6">
                <p class="text-xs text-[#757575] text-center">&copy; 2025 Novos. All rights reserved.</p>
            </div>
        </div>
    </footer>

</div>

</body>
</html>