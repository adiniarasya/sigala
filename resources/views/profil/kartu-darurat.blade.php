<x-app-layout>
    <div class="emergency-page min-h-screen bg-[#f8fafc] pb-24">
        <div class="max-w-5xl mx-auto px-4 py-8">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 print:hidden">
                <div class="flex items-center gap-4">
                    <a href="{{ route('profil') }}" class="w-11 h-11 rounded-xl bg-white border border-slate-200 flex items-center justify-center shadow-sm hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </a>
                    <div>
                        <h1 class="text-2xl font-extrabold text-sigala-dark">Kartu Darurat</h1>
                        <p class="text-sm text-gray-500">Identitas digital dan informasi medis Anda</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 justify-center items-start">
                
                <div class="w-full max-w-[520px]">
                    <div class="mb-3 flex justify-between items-center print:hidden px-2">
                        <div>
                            <p class="text-[10px] font-bold text-sigala-blue tracking-[2px]">01 — IDENTITY</p>
                            <h2 class="font-bold text-sigala-dark">Kartu Identitas</h2>
                        </div>
                        <span class="text-xs text-gray-400">Sisi depan</span>
                    </div>

                    <div class="sigala-card card-front">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="card-shine"></div>

                        <div class="card-content">
                            <div class="brand-row">
                                <div class="brand-left">
                                    <div class="logo-box">
                                        <img src="{{ asset('images/logo-sigala.png') }}" alt="SIGALA" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                        <span class="logo-fallback">S</span>
                                    </div>
                                    <div>
                                        <h2 class="brand-name">SIGALA</h2>
                                        <p class="brand-subtitle">SMART EMERGENCY SYSTEM</p>
                                    </div>
                                </div>
                                <div class="brand-right">
                                    <span>IDENTITY CARD</span>
                                    <strong>INDONESIA</strong>
                                </div>
                            </div>

                            <div class="card-divider"></div>

                            <div class="identity-content">
                                <div class="identity-details">
                                    <div class="identity-name">
                                        <span>NAMA LENGKAP</span>
                                        <h3>{{ Auth::user()->name }}</h3>
                                    </div>
                                    <div class="identity-grid">
                                        <div><span>TANGGAL LAHIR</span><strong>{{ Auth::user()->tanggal_lahir ?? '-' }}</strong></div>
                                        <div><span>JENIS KELAMIN</span><strong>{{ Auth::user()->gender ?? '-' }}</strong></div>
                                        <div><span>USIA</span><strong>{{ Auth::user()->usia ?? '-' }} Tahun</strong></div>
                                        <div><span>GOLONGAN DARAH</span><strong class="blood-text">{{ Auth::user()->golongan_darah ?? '-' }}</strong></div>
                                    </div>
                                </div>
                                <div class="photo-frame">
                                    @if(Auth::user()->foto_profil)
                                        <img src="{{ Storage::url(Auth::user()->foto_profil) }}" alt="Foto">
                                    @else
                                        <div class="photo-placeholder">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="address-section">
                                <span>ALAMAT DOMISILI</span>
                                <p>{{ Auth::user()->alamat ?? '-' }}</p>
                            </div>

                            <div class="card-footer">
                                <span>PERSONAL EMERGENCY IDENTIFICATION</span>
                                <strong>SIGALA-{{ str_pad(Auth::id(), 5, '0', STR_PAD_LEFT) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-[520px]">
                    <div class="mb-3 flex justify-between items-center print:hidden px-2">
                        <div>
                            <p class="text-[10px] font-bold text-teal-500 tracking-[2px]">02 — MEDICAL</p>
                            <h2 class="font-bold text-sigala-dark">Informasi Medis</h2>
                        </div>
                        <span class="text-xs text-gray-400">Sisi belakang</span>
                    </div>

                    <div class="sigala-card card-back">
                        <div class="back-content">
                            <div class="back-header">
                                <div class="brand-left">
                                    <div class="back-logo">
                                        <img src="{{ asset('images/logo-sigala.png') }}" alt="SIGALA" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                        <span class="logo-fallback">S</span>
                                    </div>
                                    <div>
                                        <h3>SIGALA</h3>
                                        <p>EMERGENCY MEDICAL CARD</p>
                                    </div>
                                </div>
                                <div class="medical-badge">
                                    <span class="medical-dot"></span> MEDICAL INFO
                                </div>
                            </div>

                            <div class="medical-grid">
                                <div class="medical-box blood-box">
                                    <span class="medical-label">GOLONGAN DARAH</span>
                                    <strong>{{ Auth::user()->golongan_darah ?? '-' }}</strong>
                                    <small>BLOOD TYPE</small>
                                </div>
                                <div class="medical-box allergy-box">
                                    <span class="medical-label">ALERGI</span>
                                    <strong>{{ Auth::user()->alergi ?? 'Tidak Ada' }}</strong>
                                    <small>ALLERGY INFORMATION</small>
                                </div>
                            </div>

                            <div class="history-box">
                                <div class="history-heading">
                                    <span class="history-icon">+</span> <span>RIWAYAT PENYAKIT</span>
                                </div>
                                <p>{{ Auth::user()->riwayat_penyakit ?? 'Tidak ada riwayat penyakit kronis' }}</p>
                            </div>

                            <div class="contact-box">
                                <div>
                                    <span>KONTAK DARURAT</span>
                                    <strong>{{ Auth::user()->whatsapp ?? '-' }}</strong>
                                </div>
                                <div class="contact-separator"></div>
                                <div class="national-contact">
                                    <span>LAYANAN DARURAT</span>
                                    <strong>112 / 119</strong>
                                </div>
                            </div>

                            <div class="back-footer">
                                <p>JIKA TERJADI KEADAAN DARURAT, SEGERA HUBUNGI KONTAK TERTERA.</p>
                                <strong>POWERED BY SIGALA</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-3 print:hidden max-w-[520px] mx-auto lg:max-w-none">
                <button onclick="window.print()" class="flex-1 flex justify-center items-center gap-2 py-4 px-6 rounded-xl bg-sigala-blue hover:bg-blue-700 text-white font-bold shadow-lg shadow-blue-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v7H6z"/></svg>
                    Cetak Kedua Sisi
                </button>
                <a href="{{ route('profil') }}" class="px-7 py-4 rounded-xl bg-white border border-gray-200 text-gray-700 text-center font-bold hover:bg-gray-50 transition">
                    Kembali
                </a>
            </div>

            <p class="text-center text-xs text-gray-400 mt-5 print:hidden">SIGALA — Smart Emergency Information System</p>
        </div>
    </div>

    <style>
        .emergency-page { background: #f8fafc; }

        .sigala-card {
            width: 100%;
            max-width: 520px;
            height: 328px;
            margin: 0 auto;
            border-radius: 18px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 16px 35px rgba(20, 43, 72, .16);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .card-front { background: linear-gradient(125deg, #102b49 0%, #174b78 65%, #24628f 100%); color: white; }
        .card-content { position: relative; z-index: 2; height: 100%; padding: 20px 25px 15px; display: flex; flex-direction: column; }

        .circle { position: absolute; border: 1px solid rgba(255,255,255,.12); border-radius: 50%; pointer-events: none; }
        .circle-one { width: 240px; height: 240px; right: -100px; top: -130px; }
        .circle-two { width: 220px; height: 220px; right: -100px; bottom: -155px; }
        .card-shine { position: absolute; top: 0; right: 0; width: 45%; height: 100%; background: linear-gradient(120deg, transparent, rgba(255,255,255,.045)); pointer-events: none; }

        .brand-row, .brand-left { display: flex; align-items: center; }
        .brand-row { justify-content: space-between; gap: 10px; }
        .brand-left { gap: 11px; }

        .logo-box { width: 42px; height: 42px; background: white; border-radius: 10px; padding: 4px; flex-shrink: 0; position: relative; }
        .logo-box img, .back-logo img { width: 100%; height: 100%; object-fit: contain; }
        .logo-fallback { display: none; position: absolute; inset: 0; align-items: center; justify-content: center; font-size: 24px; font-weight: 900; color: #174b78; }

        .brand-name { font-size: 18px; font-weight: 900; letter-spacing: 2px; line-height: 1.1; color: white; }
        .brand-subtitle { font-size: 7px; letter-spacing: 1px; margin-top: 2px; color: #c8d9eb; font-weight: 700; }
        .brand-right { text-align: right; display: flex; flex-direction: column; gap: 2px; }
        .brand-right span { font-size: 7px; color: #c8d9eb; letter-spacing: 1px; font-weight: 700; }
        .brand-right strong { font-size: 9px; color: white; letter-spacing: 1px; }

        .card-divider { height: 1px; background: rgba(255,255,255,.2); margin: 12px 0; }

        .identity-content { display: flex; gap: 15px; flex: 1; min-height: 0; }
        .identity-details { flex: 1; min-width: 0; display: flex; flex-direction: column; justify-content: center; }

        .identity-name span, .identity-grid span, .address-section span {
            display: block; color: #9bbbe0; font-size: 7px; font-weight: 700; letter-spacing: 0.5px; margin-bottom: 2px;
        }

        .identity-name h3 { font-size: 20px; font-weight: 900; line-height: 1.1; color: white; overflow-wrap: break-word; margin-bottom: 12px; }
        .identity-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .identity-grid strong { font-size: 10px; color: white; font-weight: 800; display: block; }
        .identity-grid .blood-text { color: #ffb5b5; }

        .photo-frame { width: 90px; height: 120px; flex-shrink: 0; border: 2px solid rgba(255,255,255,.7); border-radius: 8px; overflow: hidden; background: #dbe5ee; margin-top: auto; margin-bottom: auto; }
        .photo-frame img { width: 100%; height: 100%; object-fit: cover; }
        .photo-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #174b78; font-size: 40px; font-weight: 900; }

        .address-section { margin-top: auto; border-top: 1px solid rgba(255,255,255,.15); padding-top: 8px; }
        .address-section p { color: white; font-size: 9px; font-weight: 600; line-height: 1.3; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

        .card-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(255,255,255,.15); padding-top: 8px; margin-top: 8px; }
        .card-footer span { color: #8fa9c7; font-size: 6px; letter-spacing: 0.5px; font-weight: 700; }
        .card-footer strong { font-family: monospace; color: white; font-size: 8px; letter-spacing: 1px; }

        .card-back { background: #fff; border: 1px solid #dfe6ee; }
        .back-content { padding: 18px 22px; height: 100%; display: flex; flex-direction: column; position: relative; z-index: 1; }

        .back-header { display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e6ebf0; padding-bottom: 10px; }
        .back-logo { width: 32px; height: 32px; position: relative; flex-shrink: 0; }
        .back-logo .logo-fallback { color: #174b78; }
        .back-header h3 { color: #173b65; font-size: 14px; font-weight: 900; letter-spacing: 1.5px; line-height: 1; }
        .back-header p { color: #8492a3; font-size: 6px; letter-spacing: 0.5px; font-weight: 700; margin-top: 2px; }
        .medical-badge { display: flex; align-items: center; gap: 5px; padding: 5px 9px; border-radius: 20px; background: #edf4fb; color: #245a8c; font-size: 7px; font-weight: 800; letter-spacing: .5px; }
        .medical-dot { width: 6px; height: 6px; background: #3c8ac2; border-radius: 50%; }

        .medical-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 12px; }
        .medical-box { border-radius: 8px; padding: 10px; min-width: 0; }
        .blood-box { background: #fff3f3; border: 1px solid #f6dddd; }
        .allergy-box { background: #fff8ec; border: 1px solid #f5e8d0; }
        .medical-label { display: block; font-size: 7px; font-weight: 800; letter-spacing: .5px; margin-bottom: 2px; }
        .blood-box .medical-label, .blood-box strong { color: #c43f48; }
        .allergy-box .medical-label, .allergy-box strong { color: #a66b19; }
        .medical-box strong { display: block; font-size: 18px; font-weight: 900; line-height: 1.1; overflow-wrap: break-word; }
        .allergy-box strong { font-size: 11px; }
        .medical-box small { display: block; margin-top: 2px; font-size: 6px; color: #9b9b9b; letter-spacing: .5px; }

        .history-box { margin-top: 10px; background: #f1f6fc; border: 1px solid #e0eaf5; padding: 8px 12px; border-radius: 8px; flex: 1; min-height: 0; }
        .history-heading { display: flex; align-items: center; gap: 6px; font-size: 7px; font-weight: 900; letter-spacing: .5px; color: #345b83; }
        .history-icon { width: 14px; height: 14px; background: #dceafa; color: #245a8c; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 12px; }
        .history-box p { margin-top: 4px; font-size: 9px; line-height: 1.3; font-weight: 700; color: #304d6b; overflow-wrap: break-word; }

        .contact-box { background: #173b65; border-radius: 8px; padding: 10px 12px; margin-top: 10px; display: flex; align-items: center; justify-content: space-between; gap: 10px; color: white; }
        .contact-box span { display: block; font-size: 6px; color: #b9cee2; font-weight: 800; letter-spacing: 1px; margin-bottom: 2px; }
        .contact-box strong { display: block; font-size: 12px; font-weight: 900; line-height: 1; }
        .contact-separator { width: 1px; height: 24px; background: rgba(255,255,255,.3); flex-shrink: 0; }
        .national-contact { text-align: right; flex-shrink: 0; }

        .back-footer { display: flex; justify-content: space-between; align-items: center; gap: 8px; border-top: 1px dashed #d6dee7; padding-top: 6px; margin-top: 8px; }
        .back-footer p { color: #7b8795; font-size: 5px; font-weight: 800; letter-spacing: .5px; line-height: 1.2; max-width: 70%; }
        .back-footer strong { color: #173b65; font-size: 7px; letter-spacing: 1px; white-space: nowrap; }

        @media screen and (max-width: 520px) {
            .sigala-card { height: 290px; }
            .card-content { padding: 15px 15px 10px; }
            .brand-name { font-size: 15px; }
            .logo-box { width: 34px; height: 34px; }
            .photo-frame { width: 80px; height: 110px; }
            .identity-name h3 { font-size: 16px; }
            .identity-grid { gap: 8px; }
            .identity-grid span, .identity-name span, .address-section span { font-size: 6px; }
            .identity-grid strong { font-size: 9px; }
            .address-section p { font-size: 8px; }
            .card-footer { padding-top: 6px; margin-top: 6px; }
            .back-content { padding: 12px 14px; }
            .medical-grid { gap: 8px; margin-top: 8px; }
            .medical-box { padding: 8px; }
            .medical-label { font-size: 6px; }
            .medical-box strong { font-size: 14px; }
            .allergy-box strong { font-size: 9px; }
            .history-box { padding: 8px 10px; margin-top: 8px; }
            .history-box p { font-size: 8px; }
            .contact-box { margin-top: 8px; padding: 8px 10px; }
            .contact-box strong { font-size: 10px; }
            .back-footer { margin-top: 6px; padding-top: 6px; }
            .back-footer strong { font-size: 6px; }
        }

        @media print {
            @page { size: A4 portrait; margin: 15mm auto; }
            body { background: white !important; -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
            body * { visibility: hidden !important; }
            
            .sigala-card, .sigala-card * { visibility: visible !important; }
            .sigala-card { 
                width: 85.6mm !important; 
                height: 54mm !important; 
                margin: 0 auto !important; 
                border-radius: 3mm !important; 
                box-shadow: none !important; 
                break-inside: avoid !important; 
                border: 1px solid #ccc !important;
            }
            .card-front { break-after: page !important; page-break-after: always !important; margin-top: 20mm !important; }
            .card-back { margin-top: 20mm !important; }
            .emergency-page { padding: 0 !important; background: white !important; }
            .card-content, .back-content { padding: 4mm 4mm 2mm !important; }
        }
    </style>
</x-app-layout>