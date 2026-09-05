@extends('layouts.app')
@section('title', 'Soạn Hồ Sơ')

@section('content')
<style>
    .ruler-h {
        height: 14px; background-color: #f3f4f6; border-bottom: 1px solid #cbd5e1;
        background-image: repeating-linear-gradient(90deg, transparent, transparent 49px, #94a3b8 49px, #94a3b8 50px),
            repeating-linear-gradient(90deg, transparent, transparent 9px, #cbd5e1 9px, #cbd5e1 10px);
    }
    .editor-scrollbar::-webkit-scrollbar { width: 14px; }
    .editor-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-left: 1px solid #e2e8f0; }
    .editor-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; border: 4px solid #f1f5f9; }
    .editor-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>

<div class="h-[calc(100vh-64px)] flex w-full overflow-hidden bg-[#eaf1ff] animate-fade-in" x-data="hosoData()">

    <!-- ==========================================
         CỘT TRÁI: FORM NHẬP LIỆU (Dùng Alpine x-model)
    =========================================== -->
    <section class="w-full md:w-[35%] xl:w-[30%] bg-white border-r border-slate-300 flex flex-col h-full z-10 shadow-[4px_0_24px_rgba(0,0,0,0.04)] relative shrink-0">
        <header class="px-6 py-4 border-b border-slate-200 bg-white/90 backdrop-blur-sm sticky top-0 z-20 flex justify-between items-center">
            <div>
                <h2 class="text-[20px] font-bold text-slate-900 tracking-tight">Nhập dữ liệu</h2>
                <p class="text-[12px] text-slate-500 mt-0.5">Điền thông tin chi tiết hợp đồng</p>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto px-4 py-6 custom-scrollbar space-y-6 bg-[#f8f9ff]">
            
            <!-- SECTION A: BÊN BÁN -->
            <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                <div class="flex justify-between items-center mb-4 border-b border-slate-100 pb-2">
                    <h3 class="text-[13px] font-bold text-blue-800 uppercase tracking-wider">Bên Bán (Bên A)</h3>
                </div>
                <div class="space-y-4">
                    <template x-for="(person, index) in benA" :key="index">
                        <div class="bg-slate-50 p-4 rounded-lg border border-slate-200 relative space-y-4">
                            <button x-show="benA.length > 1" @click="benA.splice(index, 1); updateEditor()" type="button" class="absolute top-3 right-3 text-slate-400 hover:text-red-500 transition-colors">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                            </button>
                            
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Họ tên <span class="text-red-500">*</span></label>
                                <input x-model="person.hoTen" @input="updateEditor()" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 uppercase font-bold focus:outline-none input-glow" type="text" placeholder="NGUYỄN VĂN A">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-1.5 col-span-2">
                                    <label class="text-[13px] font-semibold text-slate-700 block">Số CMND/CCCD</label>
                                    <div class="flex gap-2">
                                        <input x-model="person.cccd" @input="updateEditor()" class="w-1/2 bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] font-mono font-bold focus:outline-none input-glow" type="text" placeholder="Số giấy tờ">
                                        <input x-model="person.ngayCap" @input="updateEditor()" class="w-1/2 bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] focus:outline-none input-glow" type="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <button @click="benA.push({hoTen: '', cccd: '', ngayCap: ''})" type="button" class="mt-4 w-full py-2 border border-dashed border-blue-400 text-blue-600 rounded-lg text-[13px] font-bold hover:bg-blue-50 transition-colors flex items-center justify-center gap-1.5">
                    <span class="material-symbols-outlined text-[18px]">person_add</span> Thêm người vào Bên A
                </button>
            </div>

            <!-- SECTION B: BÊN MUA -->
            <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                <div class="flex justify-between items-center mb-4 border-b border-slate-100 pb-2">
                    <h3 class="text-[13px] font-bold text-blue-800 uppercase tracking-wider">Bên Mua (Bên B)</h3>
                </div>
                <div class="space-y-4">
                    <template x-for="(person, index) in benB" :key="index">
                        <div class="bg-slate-50 p-4 rounded-lg border border-slate-200 relative space-y-4">
                            <button x-show="benB.length > 1" @click="benB.splice(index, 1); updateEditor()" type="button" class="absolute top-3 right-3 text-slate-400 hover:text-red-500 transition-colors">
                                <span class="material-symbols-outlined text-[18px]">delete</span>
                            </button>
                            
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Họ tên <span class="text-red-500">*</span></label>
                                <input x-model="person.hoTen" @input="updateEditor()" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 uppercase font-bold focus:outline-none input-glow" type="text" placeholder="TRẦN THỊ B">
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            
            <!-- SECTION TÀI SẢN -->
            <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm mb-6">
                <h3 class="text-[13px] font-bold text-blue-800 mb-4 border-b border-slate-100 pb-2 uppercase tracking-wider">Thông tin tài sản</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1.5 col-span-2">
                        <label class="text-[13px] font-semibold text-slate-700 block">Nhãn hiệu xe</label>
                        <input x-model="taiSan.nhanHieu" @input="updateEditor()" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] uppercase focus:outline-none input-glow" type="text" placeholder="Honda Airblade">
                    </div>
                    <div class="space-y-1.5 col-span-2">
                        <label class="text-[13px] font-semibold text-slate-700 block">Biển kiểm soát</label>
                        <input x-model="taiSan.bienSo" @input="updateEditor()" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] font-mono font-bold uppercase focus:outline-none input-glow" type="text" placeholder="59-X1 123.45">
                    </div>
                </div>
            </div>
        </div>

        <footer class="px-6 py-4 border-t border-slate-200 bg-white sticky bottom-0 z-20 flex justify-between items-center shadow-[0_-4px_15px_rgba(0,0,0,0.02)] shrink-0">
            <span @click="$dispatch('notify', 'Bản nháp đã được lưu cục bộ!')" class="text-[12px] font-semibold text-slate-400 cursor-pointer hover:text-slate-600">Lưu bản nháp</span>
            <button @click="$dispatch('notify', 'Đã chuyển hồ sơ sang trạng thái Chờ Duyệt!')" class="px-6 py-2 rounded-lg text-[13px] font-bold text-white bg-blue-800 hover:bg-blue-900 transition-all flex items-center gap-2">
                Gửi phê duyệt <span class="material-symbols-outlined text-[16px]">send</span>
            </button>
        </footer>
    </section>

    <!-- ==========================================
         CỘT PHẢI: GIAO DIỆN TIPTAP EDITOR
    =========================================== -->
    <section class="flex-1 flex flex-col h-full bg-[#f3f2f1] relative overflow-hidden">
        
        <!-- TOOLBAR (Gắn lệnh TipTap) -->
        <div class="bg-white border-b border-slate-300 flex items-center px-4 py-2 gap-3 select-none shrink-0 z-20 overflow-x-auto custom-scrollbar">
            <div class="flex items-center gap-1 shrink-0">
                <button class="border border-slate-300 rounded px-2 py-1.5 text-[13px] text-slate-700 w-36 hover:bg-slate-50 text-left">Times New Roman</button>
                <input type="number" step="0.5" placeholder="15" class="border border-slate-300 rounded px-2 py-1.5 text-[13px] text-slate-700 w-16" disabled />
            </div>
            <div class="w-px h-6 bg-slate-300 mx-1 shrink-0"></div>

            <div class="flex items-center gap-0.5 text-slate-700 shrink-0">
                <button @click="editor.chain().focus().toggleBold().run()" :class="{ 'bg-slate-200': editor && editor.isActive('bold') }" class="hover:bg-slate-100 p-1.5 rounded font-serif font-bold text-[14px] w-8">B</button>
                <button @click="editor.chain().focus().toggleItalic().run()" :class="{ 'bg-slate-200': editor && editor.isActive('italic') }" class="hover:bg-slate-100 p-1.5 rounded font-serif italic text-[14px] w-8">I</button>
                <button @click="editor.chain().focus().toggleUnderline().run()" :class="{ 'bg-slate-200': editor && editor.isActive('underline') }" class="hover:bg-slate-100 p-1.5 rounded font-serif underline text-[14px] w-8">U</button>
            </div>
            <div class="w-px h-6 bg-slate-300 mx-1 shrink-0"></div>

            <div class="flex items-center gap-0.5 text-slate-700 shrink-0">
                <button @click="editor.chain().focus().setTextAlign('left').run()" :class="{ 'bg-slate-200': editor && editor.isActive({ textAlign: 'left' }) }" class="hover:bg-slate-100 p-1.5 rounded"><span class="material-symbols-outlined text-[18px]">format_align_left</span></button>
                <button @click="editor.chain().focus().setTextAlign('center').run()" :class="{ 'bg-slate-200': editor && editor.isActive({ textAlign: 'center' }) }" class="hover:bg-slate-100 p-1.5 rounded"><span class="material-symbols-outlined text-[18px]">format_align_center</span></button>
                <button @click="editor.chain().focus().setTextAlign('right').run()" :class="{ 'bg-slate-200': editor && editor.isActive({ textAlign: 'right' }) }" class="hover:bg-slate-100 p-1.5 rounded"><span class="material-symbols-outlined text-[18px]">format_align_right</span></button>
                <button @click="editor.chain().focus().setTextAlign('justify').run()" :class="{ 'bg-slate-200': editor && editor.isActive({ textAlign: 'justify' }) }" class="hover:bg-slate-100 p-1.5 rounded"><span class="material-symbols-outlined text-[18px]">format_align_justify</span></button>
            </div>
        </div>

        <div class="w-full ruler-h z-10 shrink-0 relative shadow-sm"></div>

        <!-- VÙNG SOẠN THẢO (Giấy A4) -->
        <div id="scroll-container" class="flex-1 overflow-y-auto overflow-x-hidden bg-[#e3e5e7] py-8 editor-scrollbar">
            <div id="word-editor-area" class="flex flex-col gap-8 w-[210mm] mx-auto origin-top transition-transform duration-200">
                <div x-ref="tiptapEditor" class="a4-page font-doc-body text-[15px] leading-[1.6] text-black"></div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script type="module">
    import { Editor } from 'https://esm.sh/@tiptap/core';
    import Document from 'https://esm.sh/@tiptap/extension-document';
    import Paragraph from 'https://esm.sh/@tiptap/extension-paragraph';
    import Text from 'https://esm.sh/@tiptap/extension-text';
    import Bold from 'https://esm.sh/@tiptap/extension-bold';
    import Italic from 'https://esm.sh/@tiptap/extension-italic';
    import Underline from 'https://esm.sh/@tiptap/extension-underline';
    import TextAlign from 'https://esm.sh/@tiptap/extension-text-align';
    import History from 'https://esm.sh/@tiptap/extension-history';

    // Đưa function ra global để Alpine luôn tìm thấy dù tải chậm hay nhanh
    window.hosoData = function() {
        return {
            benA: [{ hoTen: 'NGUYỄN VĂN A', cccd: '079090123456', ngayCap: '2015-10-12' }],
            benB: [{ hoTen: 'TRẦN THỊ B' }],
            taiSan: { nhanHieu: 'Honda Vision', bienSo: '59-X1 123.45' },
            editor: null,

            init() {
                this.editor = new Editor({
                    element: this.$refs.tiptapEditor,
                    extensions: [
                        Document, Paragraph, Text, Bold, Italic, Underline, History,
                        TextAlign.configure({ types: ['heading', 'paragraph'] }),
                    ],
                    content: this.generateContent(),
                    onUpdate: () => { this.editor = this.editor; },
                    onSelectionUpdate: () => { this.editor = this.editor; }
                });

                // Auto Zoom Fix
                const editorArea = document.getElementById('word-editor-area');
                const scrollContainer = document.getElementById('scroll-container');
                const autoFitZoom = () => {
                    const availableWidth = scrollContainer.clientWidth - 60; 
                    let scale = availableWidth / 794;
                    scale = Math.max(0.4, Math.min(scale, 1.5));
                    editorArea.style.transform = `scale(${scale})`;
                    editorArea.style.marginBottom = `${(editorArea.offsetHeight * scale) - editorArea.offsetHeight}px`;
                };
                setTimeout(autoFitZoom, 100);
                window.addEventListener('resize', autoFitZoom);
            },

            updateEditor() {
                if(this.editor) this.editor.commands.setContent(this.generateContent());
            },

            generateContent() {
                let htmlA = this.benA.map(p => `Ông/Bà: <strong>${p.hoTen || '...'}</strong> - CMND: <strong>${p.cccd || '...'}</strong>`).join('<br>');
                let htmlB = this.benB.map(p => `Ông/Bà: <strong>${p.hoTen || '...'}</strong>`).join('<br>');
                
                return `
                    <div style="text-align: center;">
                        <h2 style="font-size: 16px;"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></h2>
                        <h3 style="font-size: 15px;"><strong>Độc lập - Tự do - Hạnh phúc</strong></h3>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <h1 style="font-size: 22px;"><strong>HỢP ĐỒNG MUA BÁN XE MÁY</strong></h1>
                    </div>
                    <br>
                    <p>Hôm nay, tại văn phòng công chứng Nguyễn Thành Mỹ, Quận 11, TP.HCM. Chúng tôi gồm có:</p>
                    <p><strong>BÊN BÁN (BÊN A):</strong></p>
                    <p>${htmlA}</p>
                    <br>
                    <p><strong>BÊN MUA (BÊN B):</strong></p>
                    <p>${htmlB}</p>
                    <br>
                    <p><strong>ĐIỀU 1: ĐẶC ĐIỂM TÀI SẢN</strong></p>
                    <p>Bên A đồng ý bán cho Bên B chiếc xe máy nhãn hiệu <strong>${this.taiSan.nhanHieu || '...'}</strong>, mang biển số <strong>${this.taiSan.bienSo || '...'}</strong>.</p>
                `;
            }
        };
    };
</script>
@endsection