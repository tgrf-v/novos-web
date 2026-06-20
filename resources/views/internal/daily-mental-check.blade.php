@extends('layouts.internal')

@section('title', 'Daily Mental Check — Novos')

@section('topbar-left')
    <span class="font-bold text-gray-900">Daily Mental Check</span>
@endsection

@section('internal-content')
<div x-data="dailyMentalCheck()">
    {{-- Tab Navigation --}}
    <div class="flex gap-1 bg-white/60 backdrop-blur-sm rounded-2xl p-1.5 shadow-sm border border-white/70 max-w-2xl mr-auto mb-8">
        <template x-for="(tab, i) in tabs" :key="i">
            <button @click="activeTab = i"
                :class="activeTab === i ? 'bg-[#1a237e] text-white shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-white/60'"
                class="flex-1 px-5 py-2.5 rounded-xl text-sm font-semibold transition-all flex items-center justify-center gap-2"
            >
                <span x-html="tab.icon"></span>
                <span x-text="tab.label"></span>
            </button>
        </template>
    </div>

    {{-- ========== TAB 1: DASHBOARD ========== --}}
    <div x-show="activeTab === 0" x-cloak x-transition:enter.duration.300 class="space-y-6">
        {{-- Row 1: Skor Hari Ini + Pesan Motivasi --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Card: Skor Hari Ini --}}
            <div class="lg:col-span-2 glass-card rounded-2xl p-6">
                <template x-if="todayFilled">
                    <div>
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Skor Hari Ini</p>
                                <p class="text-sm text-gray-500 mt-0.5" x-text="todayDate"></p>
                            </div>
                            <span class="text-4xl" x-text="todayResult.emoji"></span>
                        </div>
                        <div class="mb-4">
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-bold"
                                :class="todayResult.badgeClass" x-text="todayResult.category"></span>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed" x-text="todayResult.message"></p>
                    </div>
                </template>
                <template x-if="!todayFilled">
                    <div class="text-center py-6">
                        <span class="text-5xl block mb-3">🧠</span>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Check-in Hari Ini</h3>
                        <p class="text-sm text-gray-500 mb-6">Luangkan 2 menit untuk cek kondisi mental Anda hari ini.</p>
                        <button @click="activeTab = 1"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-[#1a237e] text-white rounded-xl font-semibold hover:bg-[#283593] transition-colors shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            Isi Daily Check Sekarang
                        </button>
                    </div>
                </template>
            </div>

            {{-- Card: Pesan Motivasi Hari Ini --}}
            <div class="glass-card rounded-2xl p-6 flex flex-col">
                <div class="flex items-center justify-between mb-3">
                    <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Pesan Hari Ini</p>
                    <button @click="refreshQuote" class="p-1.5 text-gray-400 hover:text-[#1a237e] rounded-lg hover:bg-white/60 transition-colors" title="Ganti kutipan">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/></svg>
                    </button>
                </div>
                <div class="flex-1 flex flex-col justify-center">
                    <p class="text-gray-800 text-sm leading-relaxed italic mb-3">"<span x-text="currentQuote.text"></span>"</p>
                    <p class="text-xs text-gray-400 font-medium" x-text="currentQuote.author"></p>
                </div>
            </div>
        </div>

        {{-- Row 2: Edukasi + Reminder + Kepatuhan --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Card: Edukasi Minggu Ini --}}
            <div class="glass-card rounded-2xl p-6">
                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-3">Edukasi Minggu Ini</p>
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br flex items-center justify-center text-2xl shrink-0"
                        :style="'background: ' + currentEdukasi.gradient"
                        x-html="currentEdukasi.icon">
                    </div>
                    <div class="min-w-0">
                        <h4 class="font-bold text-gray-900 text-sm mb-1" x-text="currentEdukasi.title"></h4>
                        <p class="text-xs text-gray-500 leading-relaxed" x-text="currentEdukasi.desc"></p>
                    </div>
                </div>
            </div>

            {{-- Card: Reminder Berikutnya --}}
            <div class="glass-card rounded-2xl p-6">
                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-3">Reminder Berikutnya</p>
                <div class="text-center py-3">
                    <p class="text-3xl font-bold text-[#1a237e] mb-1" x-text="nextReminder.time"></p>
                    <p class="text-xs text-gray-500" x-text="nextReminder.label"></p>
                    <template x-if="nextReminder.countdown !== '—'">
                        <p class="text-xs text-gray-400 mt-2">
                            <span class="font-semibold text-gray-700" x-text="nextReminder.countdown"></span> lagi
                        </p>
                    </template>
                    <template x-if="nextReminder.countdown === '—'">
                        <p class="text-xs text-gray-400 mt-2">Waktu kerja sudah selesai</p>
                    </template>
                </div>
            </div>

            {{-- Card: Kepatuhan Micro-Break --}}
            <div class="glass-card rounded-2xl p-6">
                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-3">Kepatuhan Micro-Break</p>
                <div class="text-center py-2">
                    <div class="relative w-20 h-20 mx-auto mb-2">
                        <svg class="w-20 h-20 -rotate-90" viewBox="0 0 72 72">
                            <circle cx="36" cy="36" r="30" fill="none" stroke="#e5e7eb" stroke-width="6"/>
                            <circle cx="36" cy="36" r="30" fill="none" stroke="currentColor" stroke-width="6"
                                stroke-linecap="round" :stroke-dasharray="188.5"
                                :stroke-dashoffset="188.5 - (188.5 * compliancePercent / 100)"
                                class="text-emerald-500 transition-all duration-700"/>
                        </svg>
                        <span class="absolute inset-0 flex items-center justify-center text-lg font-bold text-gray-900" x-text="compliancePercent + '%'"></span>
                    </div>
                    <p class="text-xs text-gray-500">Minggu ini</p>
                </div>
            </div>
        </div>

        {{-- Row 3: Mini Riwayat 7 Hari --}}
        <div class="glass-card rounded-2xl p-6">
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-4">Riwayat 7 Hari Terakhir</p>
            <div class="flex items-center gap-3 justify-center flex-wrap">
                <template x-for="(day, i) in weekHistory" :key="i">
                    <div class="flex flex-col items-center gap-1.5 min-w-[52px]">
                        <span class="text-2xl" x-text="day.emoji"></span>
                        <span class="text-[10px] font-medium text-gray-500" x-text="day.label"></span>
                        <span class="text-[10px] font-semibold" :class="day.filled ? '' : 'text-gray-300'" x-text="day.filled ? day.category : '—'"></span>
                    </div>
                </template>
            </div>
        </div>
    </div>

    {{-- ========== TAB 2: ISI CHECK ========== --}}
    <div x-show="activeTab === 1" x-cloak x-transition:enter.duration.300 class="text-center py-20">
        <span class="text-5xl block mb-3">📝</span>
        <h3 class="text-lg font-bold text-gray-900 mb-1">Isi Daily Check</h3>
        <p class="text-sm text-gray-500">Form akan segera hadir.</p>
    </div>

    {{-- ========== TAB 3: RIWAYAT ========== --}}
    <div x-show="activeTab === 2" x-cloak x-transition:enter.duration.300 class="text-center py-20">
        <span class="text-5xl block mb-3">📊</span>
        <h3 class="text-lg font-bold text-gray-900 mb-1">Riwayat</h3>
        <p class="text-sm text-gray-500">Riwayat akan segera hadir.</p>
    </div>

    {{-- ========== TAB 4: EDUKASI ========== --}}
    <div x-show="activeTab === 3" x-cloak x-transition:enter.duration.300 class="text-center py-20">
        <span class="text-5xl block mb-3">📖</span>
        <h3 class="text-lg font-bold text-gray-900 mb-1">Pusat Edukasi</h3>
        <p class="text-sm text-gray-500">Konten edukasi akan segera hadir.</p>
    </div>
</div>

<script>
function dailyMentalCheck() {
    return {
        activeTab: 0,
        todayFilled: false,

        tabs: [
            { label: 'Dashboard', icon: '&#9632;' },
            { label: 'Isi Check', icon: '&#9998;' },
            { label: 'Riwayat',    icon: '&#9776;' },
            { label: 'Edukasi',    icon: '&#9733;' },
        ],

        get todayDate() {
            return new Date().toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
        },

        todayResult: {
            emoji: '😊',
            category: 'Baik',
            badgeClass: 'bg-emerald-100 text-emerald-800',
            message: 'Kondisi mental Anda dalam keadaan baik hari ini. Pertahankan semangat dan jangan lupa untuk tetap melakukan micro-break secara teratur.',
        },

        // Quotes
        quotes: [
            { text: 'Kesehatan mental bukanlah tujuan, melainkan proses. Ini tentang bagaimana Anda berkendara, bukan ke mana Anda pergi.', author: '— Noam Shpancer' },
            { text: 'Istirahat bukanlah kemalasan. Terkadang Anda perlu menjauh untuk melihat sesuatu dengan lebih jelas.', author: '— Unknown' },
            { text: 'Stres yang berlebihan bukanlah tanda bahwa Anda harus berhenti, melainkan tanda bahwa Anda perlu istirahat.', author: '— Unknown' },
            { text: 'Di sela-sela kesibukan, jangan lupa untuk mendengarkan diri sendiri. Kesehatan mental adalah prioritas, bukan pelengkap.', author: '— Novos Team' },
            { text: 'Anda tidak bisa menuangkan dari cangkir yang kosong. Isi ulang energi Anda dengan micro-break secara teratur.', author: '— Unknown' },
            { text: 'Langkah kecil setiap hari membawa perubahan besar. Mulailah dengan 5 menit untuk diri sendiri.', author: '— Novos Team' },
            { text: 'Sadarilah bahwa istirahat bukanlah kelemahan — itu adalah strategi untuk bertahan dan berkembang.', author: '— Unknown' },
            { text: 'Micro-break bukan tentang berhenti bekerja. Ini tentang bekerja lebih cerdas dengan jeda yang tepat.', author: '— Novos Team' },
        ],
        currentQuoteIndex: 0,

        get currentQuote() {
            return this.quotes[this.currentQuoteIndex];
        },

        refreshQuote() {
            let newIndex;
            do {
                newIndex = Math.floor(Math.random() * this.quotes.length);
            } while (newIndex === this.currentQuoteIndex && this.quotes.length > 1);
            this.currentQuoteIndex = newIndex;
        },

        // Edukasi
        edukasiTopics: [
            {
                title: 'Kenali Stres Kerja',
                desc: 'Pelajari tanda-tanda awal stres kerja dan cara mengelolanya sebelum berdampak pada performa.',
                icon: '&#9888;',
                gradient: 'linear-gradient(135deg, #fef3c7, #fde68a)',
            },
            {
                title: 'Pekerja Sehat',
                desc: 'Tips menjaga kesehatan fisik dan mental selama bekerja, dari postur duduk hingga manajemen waktu.',
                icon: '&#10003;',
                gradient: 'linear-gradient(135deg, #d1fae5, #a7f3d0)',
            },
            {
                title: 'Micro-Break Bukan Malas',
                desc: 'Istirahat singkat 3-5 menit terbukti meningkatkan fokus dan produktivitas — bukan kemalasan.',
                icon: '&#8986;',
                gradient: 'linear-gradient(135deg, #dbeafe, #93c5fd)',
            },
            {
                title: 'Mindfulness STOP',
                desc: 'Teknik S-T-O-P: Stop, Take a breath, Observe, Proceed. Redakan stres dalam 1 menit.',
                icon: '&#9775;',
                gradient: 'linear-gradient(135deg, #ede9fe, #c4b5fd)',
            },
        ],

        get currentEdukasi() {
            const week = this.getWeekNumber(new Date());
            return this.edukasiTopics[week % this.edukasiTopics.length];
        },

        getWeekNumber(date) {
            const startOfYear = new Date(date.getFullYear(), 0, 1);
            const diff = date - startOfYear;
            return Math.ceil((diff / 86400000 + startOfYear.getDay() + 1) / 7);
        },

        // Reminder
        get nextReminder() {
            const now = new Date();
            const jam = now.getHours();
            const menit = now.getMinutes();
            const times = [
                { time: '10:00', label: 'Micro-Break Pagi ☕', hour: 10, min: 0 },
                { time: '13:00', label: 'Micro-Break Siang 🌤️', hour: 13, min: 0 },
                { time: '15:00', label: 'Micro-Break Sore ☕', hour: 15, min: 0 },
            ];

            const currentMinutes = jam * 60 + menit;

            for (const t of times) {
                const targetMinutes = t.hour * 60 + t.min;
                if (targetMinutes > currentMinutes) {
                    const diff = targetMinutes - currentMinutes;
                    const h = Math.floor(diff / 60);
                    const m = diff % 60;
                    let countdown = '';
                    if (h > 0) countdown += h + ' jam ';
                    countdown += m + ' menit';
                    return { ...t, countdown: countdown.trim() };
                }
            }
            return { time: '—', label: 'Besok', countdown: '—' };
        },

        get compliancePercent() {
            return 85;
        },

        // Week history
        get weekHistory() {
            const days = [];
            const now = new Date();
            const results = ['😊', '😊', '😐', '😊', '😢', null, null];
            const labels = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

            for (let i = 6; i >= 0; i--) {
                const d = new Date(now);
                d.setDate(d.getDate() - i);
                const dayIdx = d.getDay();
                const result = results[6 - i];
                const filled = result !== null;
                days.push({
                    label: labels[dayIdx],
                    emoji: filled ? result : '—',
                    filled,
                    category: filled ? (result === '😊' ? 'Baik' : result === '😐' ? 'Sedang' : 'Buruk') : '',
                });
            }
            return days;
        },
    }
}
</script>
@endsection
