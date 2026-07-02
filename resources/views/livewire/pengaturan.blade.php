<div class="max-w-4xl mx-auto">
    {{-- Tab Navigation --}}
    <div class="flex gap-1 mb-6 bg-white border border-gray-200 rounded-2xl p-1.5 w-fit shadow-sm">
        <button wire:click="$set('activeTab', 'toko')"
            class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                {{ $activeTab === 'toko' ? 'bg-[#1a237e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            Toko
        </button>
        <button wire:click="$set('activeTab', 'tampilan')"
            class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                {{ $activeTab === 'tampilan' ? 'bg-[#1a237e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
            Tampilan
        </button>
        <button wire:click="$set('activeTab', 'panduan')"
            class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200
                {{ $activeTab === 'panduan' ? 'bg-[#1a237e] text-white shadow-md' : 'text-gray-600 hover:bg-gray-100' }}">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            Panduan
        </button>
    </div>

    {{-- ======= TAB TOKO ======= --}}
    @if($activeTab === 'toko')
    <div class="bg-white shadow-sm rounded-2xl p-7">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-[#1a237e]/10 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-[#1a237e]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-gray-900">Informasi Toko</h2>
                <p class="text-xs text-gray-500">Data toko yang tampil di invoice & halaman publik</p>
            </div>
        </div>
        <form wire:submit="save" class="space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Toko <span class="text-red-500">*</span></label>
                    <input type="text" wire:model="company_name" placeholder="Novos Jersey" class="w-full rounded-xl border-gray-200 bg-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a237e]/30 focus:border-[#1a237e]">
                    @error('company_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Telepon</label>
                    <input type="text" wire:model="company_phone" placeholder="0812-3456-7890" class="w-full rounded-xl border-gray-200 bg-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a237e]/30 focus:border-[#1a237e]">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                <input type="email" wire:model="company_email" placeholder="hello@novosjersey.com" class="w-full rounded-xl border-gray-200 bg-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a237e]/30 focus:border-[#1a237e]">
                @error('company_email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat</label>
                <textarea wire:model="company_address" rows="3" placeholder="Jl. Contoh No. 1, Kota, Provinsi" class="w-full rounded-xl border-gray-200 bg-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a237e]/30 focus:border-[#1a237e] resize-none"></textarea>
            </div>
            <div class="pt-1">
                <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#1a237e] text-white text-sm font-semibold rounded-xl hover:bg-[#283593] transition-all active:scale-95 disabled:opacity-50 shadow-md shadow-[#1a237e]/20">
                    <svg wire:loading wire:target="save" class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    <svg wire:loading.remove wire:target="save" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
    @endif

    {{-- ======= TAB TAMPILAN ======= --}}
    @if($activeTab === 'tampilan')
    <div x-data="appearanceApp()" x-init="init()" class="space-y-5">
        {{-- Mode Tema --}}
        <div class="bg-white shadow-sm rounded-2xl p-7">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Mode Tema</h2>
                    <p class="text-xs text-gray-500">Pilih antara terang, gelap, atau ikuti sistem</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <template x-for="m in themeOptions" :key="m.value">
                    <button @click="applyTheme(m.value)"
                        :class="appearance.theme===m.value ? 'ring-2 ring-[#1a237e] bg-[#1a237e]/5' : 'hover:bg-gray-50'"
                        class="flex flex-col items-center gap-2 p-4 rounded-xl border-2 border-transparent transition-all">
                        <div class="w-12 h-8 rounded-lg overflow-hidden border border-gray-200 shadow-sm" :class="m.preview"></div>
                        <span class="text-xs font-semibold text-gray-700" x-text="m.label"></span>
                        <div x-show="appearance.theme===m.value" class="w-4 h-4 bg-[#1a237e] rounded-full flex items-center justify-center">
                            <svg class="w-2.5 h-2.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </button>
                </template>
            </div>
        </div>

        {{-- Color Palette --}}
        <div class="bg-white shadow-sm rounded-2xl p-7">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-pink-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Color Palette</h2>
                    <p class="text-xs text-gray-500">Pilih kombinasi warna untuk seluruh elemen tampilan</p>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <template x-for="scheme in colorSchemes" :key="scheme.name">
                    <button @click="applyScheme(scheme)"
                        :class="appearance.scheme===scheme.name ? 'ring-2 ring-offset-2 ring-gray-400' : 'hover:scale-105'"
                        class="relative rounded-xl p-3 border border-gray-100 bg-white transition-all shadow-sm group">
                        <div class="flex gap-1 mb-2">
                            <div class="h-6 flex-1 rounded-md" :style="'background:'+scheme.primary"></div>
                            <div class="h-6 flex-1 rounded-md" :style="'background:'+scheme.secondary"></div>
                            <div class="h-6 flex-1 rounded-md" :style="'background:'+scheme.accent"></div>
                        </div>
                        <p class="text-xs font-semibold text-gray-700 text-center" x-text="scheme.name"></p>
                        <div x-show="appearance.scheme===scheme.name"
                             class="absolute top-1.5 right-1.5 w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-2.5 h-2.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </button>
                </template>
            </div>
        </div>

        {{-- Custom Color --}}
        <div class="bg-white shadow-sm rounded-2xl p-7">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Warna Kustom</h2>
                    <p class="text-xs text-gray-500">Atur warna primary & secondary secara manual</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Warna Primary</label>
                    <div class="flex items-center gap-3">
                        <input type="color" x-model="appearance.primary" @input="applyCustomColors()" class="w-12 h-12 rounded-xl cursor-pointer border-2 border-gray-200 p-0.5">
                        <div>
                            <div class="text-sm font-mono font-semibold text-gray-800" x-text="appearance.primary"></div>
                            <div class="text-xs text-gray-400">Warna utama</div>
                        </div>
                        <div class="flex-1 h-10 rounded-xl shadow-sm" :style="'background:'+appearance.primary"></div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Warna Secondary</label>
                    <div class="flex items-center gap-3">
                        <input type="color" x-model="appearance.secondary" @input="applyCustomColors()" class="w-12 h-12 rounded-xl cursor-pointer border-2 border-gray-200 p-0.5">
                        <div>
                            <div class="text-sm font-mono font-semibold text-gray-800" x-text="appearance.secondary"></div>
                            <div class="text-xs text-gray-400">Warna pendukung</div>
                        </div>
                        <div class="flex-1 h-10 rounded-xl shadow-sm" :style="'background:'+appearance.secondary"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Font Size --}}
        <div class="bg-white shadow-sm rounded-2xl p-7">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-teal-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Ukuran Font</h2>
                    <p class="text-xs text-gray-500">Sesuaikan ukuran teks untuk kenyamanan membaca</p>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-3">
                <template x-for="fs in fontSizes" :key="fs.value">
                    <button @click="applyFontSize(fs.value)"
                        :class="appearance.fontSize===fs.value ? 'ring-2 ring-[#1a237e] bg-[#1a237e]/5 text-[#1a237e]' : 'hover:bg-gray-50 text-gray-600'"
                        class="flex flex-col items-center gap-1.5 p-4 rounded-xl border-2 border-transparent transition-all">
                        <span class="font-bold" :style="'font-size:'+fs.preview+'px'" x-text="'Aa'"></span>
                        <span class="text-xs font-semibold" x-text="fs.label"></span>
                    </button>
                </template>
            </div>
        </div>

        {{-- Button Style --}}
        <div class="bg-white shadow-sm rounded-2xl p-7">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Gaya Tombol</h2>
                    <p class="text-xs text-gray-500">Pilih tampilan tombol</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <template x-for="bs in buttonStyles" :key="bs.value">
                    <button @click="applyButtonStyle(bs.value)"
                        :class="appearance.buttonStyle===bs.value ? 'ring-2 ring-[#1a237e] bg-[#1a237e]/5' : 'hover:bg-gray-50'"
                        class="flex flex-col items-center gap-3 p-5 rounded-xl border-2 border-transparent transition-all">
                        <div class="px-5 py-2 text-sm font-semibold text-white" :class="bs.previewClass" :style="'background:'+appearance.primary">Simpan</div>
                        <div>
                            <p class="text-sm font-bold text-gray-800" x-text="bs.label"></p>
                            <p class="text-xs text-gray-400" x-text="bs.desc"></p>
                        </div>
                    </button>
                </template>
            </div>
        </div>

        {{-- Rounded --}}
        <div class="bg-white shadow-sm rounded-2xl p-7">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-yellow-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Sudut Komponen</h2>
                    <p class="text-xs text-gray-500">Atur kelengkungan sudut elemen UI</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <template x-for="r in roundedOptions" :key="r.value">
                    <button @click="applyRounded(r.value)"
                        :class="appearance.rounded===r.value ? 'ring-2 ring-[#1a237e] bg-[#1a237e]/5' : 'hover:bg-gray-50'"
                        class="flex flex-col items-center gap-2.5 p-4 rounded-xl border-2 border-transparent transition-all">
                        <div class="w-12 h-8 bg-gray-300" :style="'border-radius:'+r.px+'px'"></div>
                        <span class="text-xs font-semibold text-gray-700" x-text="r.label"></span>
                    </button>
                </template>
            </div>
        </div>

        {{-- Kepadatan --}}
        <div class="bg-white shadow-sm rounded-2xl p-7">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm0 8a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2zm0 8a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2z"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Kepadatan Tata Letak</h2>
                    <p class="text-xs text-gray-500">Atur kerapatan elemen</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <template x-for="d in densities" :key="d.value">
                    <button @click="applyDensity(d.value)"
                        :class="appearance.density===d.value ? 'ring-2 ring-[#1a237e] bg-[#1a237e]/5 text-[#1a237e]' : 'hover:bg-gray-50 text-gray-600'"
                        class="flex flex-col items-center gap-1.5 p-4 rounded-xl border-2 border-transparent transition-all">
                        <span class="text-sm font-bold" x-text="d.label"></span>
                        <span class="text-[10px] text-gray-400" x-text="d.desc"></span>
                    </button>
                </template>
            </div>
        </div>

        {{-- Font Family --}}
        <div class="bg-white shadow-sm rounded-2xl p-7">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Gaya Font</h2>
                    <p class="text-xs text-gray-500">Pilih jenis huruf</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <template x-for="f in fontOptions" :key="f.value">
                    <button @click="applyFontFamily(f.value)"
                        :class="appearance.fontFamily===f.value ? 'ring-2 ring-[#1a237e] bg-[#1a237e]/5 text-[#1a237e]' : 'hover:bg-gray-50 text-gray-600'"
                        class="flex flex-col items-center gap-1.5 p-4 rounded-xl border-2 border-transparent transition-all"
                        :style="'font-family: ' + f.family + ', sans-serif;'">
                        <span class="text-lg font-bold" x-text="'Novos Web'"></span>
                        <span class="text-xs font-semibold" x-text="f.label"></span>
                    </button>
                </template>
            </div>
        </div>

        {{-- Preview & Reset --}}
        <div class="flex items-center justify-between">
            <button @click="resetAppearance()" class="inline-flex items-center gap-2 px-5 py-2.5 border border-gray-200 text-gray-600 text-sm font-semibold rounded-xl hover:bg-gray-50 transition-all">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Reset ke Default
            </button>
            <button @click="saveAppearance()" class="inline-flex items-center gap-2 px-6 py-2.5 bg-[#1a237e] text-white text-sm font-semibold rounded-xl hover:bg-[#283593] transition-all shadow-md shadow-[#1a237e]/20 active:scale-95">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Terapkan Tampilan
            </button>
        </div>
    </div>
    @endif

    {{-- ======= TAB PANDUAN ======= --}}
    @if($activeTab === 'panduan')
    <div class="space-y-5">
        <div class="bg-white rounded-2xl p-7">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-[#1a237e] rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Panduan Pengguna</h2>
                    <p class="text-sm text-gray-500">Pelajari semua fitur dan cara penggunaan panel internal Novos</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-7">
            <h2 class="text-base font-bold text-gray-900 mb-5">Daftar Isi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
                @foreach([
                    ['id' => 'dashboard', 'label' => 'Dashboard', 'desc' => 'Halaman utama ringkasan aktivitas'],
                    ['id' => 'daftar-pesanan', 'label' => 'Daftar Pesanan', 'desc' => 'Kelola semua pesanan pelanggan'],
                    ['id' => 'design', 'label' => 'Design', 'desc' => 'Manajemen proses desain jersey'],
                    ['id' => 'produksi', 'label' => 'Produksi', 'desc' => 'Manajemen proses produksi'],
                    ['id' => 'chat', 'label' => 'Chat', 'desc' => 'Komunikasi dengan pelanggan'],
                    ['id' => 'laporan', 'label' => 'Laporan', 'desc' => 'Cetak & ekspor laporan bisnis'],
                    ['id' => 'kelola-produk', 'label' => 'Kelola Produk', 'desc' => 'Atur katalog produk jersey'],
                    ['id' => 'kategori', 'label' => 'Kategori', 'desc' => 'Kelola kategori produk'],
                    ['id' => 'kelola-pengguna', 'label' => 'Kelola Pengguna', 'desc' => 'Manajemen akun staf'],
                    ['id' => 'notifikasi', 'label' => 'Notifikasi', 'desc' => 'Pusat pemberitahuan'],
                    ['id' => 'pengaturan', 'label' => 'Pengaturan', 'desc' => 'Konfigurasi toko & tampilan'],
                    ['id' => 'daily-mental-check', 'label' => 'Daily Mental Check', 'desc' => 'Cek kesehatan mental tim'],
                ] as $item)
                <a href="#panduan-{{ $item['id'] }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-100 transition-colors group">
                    <span class="w-8 h-8 rounded-lg bg-[#1a237e] flex items-center justify-center text-xs font-bold text-white shrink-0">
                        <span>{{ $loop->iteration }}</span>
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-gray-800 group-hover:text-[#1a237e]">{{ $item['label'] }}</p>
                        <p class="text-xs text-gray-400">{{ $item['desc'] }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        @foreach([
            ['id' => 'dashboard', 'label' => 'Dashboard', 'desc' => 'Halaman utama ringkasan aktivitas'],
            ['id' => 'daftar-pesanan', 'label' => 'Daftar Pesanan', 'desc' => 'Kelola semua pesanan pelanggan'],
        ] as $section)
        <div id="panduan-{{ $section['id'] }}" class="bg-white rounded-2xl p-7 scroll-mt-24">
            <h3 class="text-base font-bold text-gray-900">{{ $section['label'] }}</h3>
            <p class="text-xs text-gray-400 mt-0.5">{{ $section['desc'] }}</p>
            <div class="mt-4 text-sm text-gray-600 leading-relaxed">
                <p>Halaman ini akan segera dilengkapi dengan konten panduan detail.</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

@if($activeTab === 'tampilan')
<script>
function appearanceApp() {
    const DEFAULT_APPEARANCE = {
        theme: 'light',
        scheme: 'Novos',
        primary: '#1a237e',
        secondary: '#3949ab',
        fontSize: 'md',
        buttonStyle: 'flat',
        rounded: 'xl',
        density: 'comfortable',
        fontFamily: 'poppins',
    };
    return {
        appearance: { ...DEFAULT_APPEARANCE },
        themeOptions: [
            { value: 'light', label: 'Terang', preview: 'bg-white' },
            { value: 'dark',  label: 'Gelap',  preview: 'bg-gray-900' },
            { value: 'auto',  label: 'Otomatis', preview: 'bg-gradient-to-r from-white to-gray-900' },
        ],
        colorSchemes: [
            { name: 'Novos',    primary: '#1a237e', secondary: '#3949ab', accent: '#e8eaf6' },
            { name: 'Ocean',    primary: '#0277bd', secondary: '#0288d1', accent: '#e1f5fe' },
            { name: 'Forest',   primary: '#2e7d32', secondary: '#388e3c', accent: '#e8f5e9' },
            { name: 'Sunset',   primary: '#bf360c', secondary: '#d84315', accent: '#fbe9e7' },
            { name: 'Purple',   primary: '#6a1b9a', secondary: '#7b1fa2', accent: '#f3e5f5' },
            { name: 'Teal',     primary: '#00695c', secondary: '#00796b', accent: '#e0f2f1' },
            { name: 'Rose',     primary: '#c62828', secondary: '#e53935', accent: '#ffebee' },
            { name: 'Slate',    primary: '#37474f', secondary: '#455a64', accent: '#eceff1' },
        ],
        fontSizes: [
            { value: 'sm',  label: 'Kecil',   preview: 11 },
            { value: 'md',  label: 'Sedang',  preview: 14 },
            { value: 'lg',  label: 'Besar',   preview: 17 },
            { value: 'xl',  label: 'Ekstra',  preview: 21 },
        ],
        buttonStyles: [
            { value: 'flat',    label: 'Flat / Modern', desc: 'Datar & bersih',  previewClass: 'rounded-lg' },
            { value: '3d',      label: '3D Effect',     desc: 'Tampak timbul',   previewClass: 'rounded-lg shadow-[0_4px_0_rgba(0,0,0,0.3)] translate-y-0 active:translate-y-1' },
            { value: 'outline', label: 'Outline',       desc: 'Hanya garis tepi', previewClass: 'rounded-lg !bg-transparent border-2 !text-[var(--color-primary)]' },
        ],
        roundedOptions: [
            { value: 'none', label: 'Kotak',   px: 0  },
            { value: 'sm',   label: 'Kecil',   px: 4  },
            { value: 'xl',   label: 'Rounded', px: 12 },
        ],
        densities: [
            { value: 'compact', label: 'Compact', desc: 'Jarak padat' },
            { value: 'comfortable', label: 'Comfortable', desc: 'Jarak sedang' },
            { value: 'spacious', label: 'Spacious', desc: 'Jarak luas' },
        ],
        fontOptions: [
            { value: 'poppins', label: 'Poppins', family: 'Poppins' },
            { value: 'inter', label: 'Inter', family: 'Inter' },
            { value: 'outfit', label: 'Outfit', family: 'Outfit' },
        ],
        init() {
            const saved = localStorage.getItem('novos_appearance');
            if (saved) {
                try { this.appearance = { ...DEFAULT_APPEARANCE, ...JSON.parse(saved) }; } catch(e) {}
            }
            let isDark = this.appearance.theme === 'dark' || (this.appearance.theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) {
                if (this.appearance.scheme === 'Novos' || this.appearance.primary === '#1a237e') {
                    this.appearance.scheme = 'Ocean';
                    this.appearance.primary = '#0277bd';
                    this.appearance.secondary = '#0288d1';
                }
            } else {
                if (this.appearance.scheme === 'Ocean' || this.appearance.primary === '#0277bd') {
                    this.appearance.scheme = 'Novos';
                    this.appearance.primary = '#1a237e';
                    this.appearance.secondary = '#3949ab';
                }
            }
            this.applyAll();
            this.$nextTick(() => { if (window.lucide) lucide.createIcons({ icons: window.lucide.icons }); });
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (this.appearance.theme === 'auto') {
                    this._applyTheme('auto');
                    if (e.matches && (this.appearance.scheme === 'Novos' || this.appearance.primary === '#1a237e')) {
                        this.appearance.scheme = 'Ocean';
                        this.appearance.primary = '#0277bd';
                        this.appearance.secondary = '#0288d1';
                        this._applyColors('#0277bd', '#0288d1');
                    } else if (!e.matches && (this.appearance.scheme === 'Ocean' || this.appearance.primary === '#0277bd')) {
                        this.appearance.scheme = 'Novos';
                        this.appearance.primary = '#1a237e';
                        this.appearance.secondary = '#3949ab';
                        this._applyColors('#1a237e', '#3949ab');
                    }
                }
            });
        },
        applyTheme(val) {
            this.appearance.theme = val;
            this._applyTheme(val);
            let isDark = val === 'dark' || (val === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark && (this.appearance.scheme === 'Novos' || this.appearance.primary === '#1a237e')) {
                this.appearance.scheme = 'Ocean';
                this.appearance.primary = '#0277bd';
                this.appearance.secondary = '#0288d1';
                this._applyColors('#0277bd', '#0288d1');
            } else if (!isDark && (this.appearance.scheme === 'Ocean' || this.appearance.primary === '#0277bd')) {
                this.appearance.scheme = 'Novos';
                this.appearance.primary = '#1a237e';
                this.appearance.secondary = '#3949ab';
                this._applyColors('#1a237e', '#3949ab');
            }
        },
        _applyTheme(val) {
            let isDark = val === 'dark' || (val === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
            document.body.classList.toggle('theme-dark', isDark);
        },
        applyScheme(scheme) {
            this.appearance.scheme = scheme.name;
            this.appearance.primary = scheme.primary;
            this.appearance.secondary = scheme.secondary;
            this._applyColors(scheme.primary, scheme.secondary);
        },
        applyCustomColors() {
            this.appearance.scheme = 'custom';
            this._applyColors(this.appearance.primary, this.appearance.secondary);
        },
        _applyColors(primary, secondary) {
            document.documentElement.style.setProperty('--color-primary', primary);
            document.documentElement.style.setProperty('--color-secondary', secondary);
            var hex = primary.replace('#', '');
            if (hex.length === 3) hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
            var r = parseInt(hex.substring(0,2), 16);
            var g = parseInt(hex.substring(2,4), 16);
            var b = parseInt(hex.substring(4,6), 16);
            if (!isNaN(r) && !isNaN(g) && !isNaN(b)) {
                document.documentElement.style.setProperty('--color-primary-rgb', r + ',' + g + ',' + b);
            }
        },
        applyFontSize(val) {
            this.appearance.fontSize = val;
            const map = { sm: '13px', md: '15px', lg: '17px', xl: '19px' };
            document.documentElement.style.setProperty('--font-size-base', map[val] || '15px');
        },
        applyButtonStyle(val) {
            this.appearance.buttonStyle = val;
            document.documentElement.setAttribute('data-btn-style', val);
        },
        applyRounded(val) {
            this.appearance.rounded = val;
            const map = { none: '0px', sm: '6px', xl: '12px', full: '9999px' };
            document.documentElement.style.setProperty('--radius-base', map[val] || '12px');
        },
        applyDensity(val) {
            this.appearance.density = val;
            document.documentElement.setAttribute('data-density', val);
        },
        applyFontFamily(val) {
            this.appearance.fontFamily = val;
            const fontMap = { poppins: "'Poppins'", inter: "'Inter'", outfit: "'Outfit'" };
            document.documentElement.style.setProperty('--font-family-base', fontMap[val] || "'Poppins'");
        },
        applyAll() {
            this._applyTheme(this.appearance.theme);
            this._applyColors(this.appearance.primary, this.appearance.secondary);
            this.applyFontSize(this.appearance.fontSize);
            this.applyButtonStyle(this.appearance.buttonStyle);
            this.applyRounded(this.appearance.rounded);
            this.applyDensity(this.appearance.density || 'comfortable');
            this.applyFontFamily(this.appearance.fontFamily || 'poppins');
        },
        saveAppearance() {
            localStorage.setItem('novos_appearance', JSON.stringify(this.appearance));
            this.applyAll();
            window.Notify?.success('Tampilan berhasil diterapkan & disimpan.');
        },
        resetAppearance() {
            this.appearance = { ...DEFAULT_APPEARANCE };
            localStorage.removeItem('novos_appearance');
            this.applyAll();
            window.Notify?.info('Tampilan direset ke default.');
        },
    };
}
</script>
@endif
