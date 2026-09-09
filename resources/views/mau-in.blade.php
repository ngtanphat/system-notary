@extends('layouts.app')
@section('title', 'Quản Lý Mẫu In')

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

<!-- Đổi flex thành flex-col lg:flex-row để tự động rớt dòng trên Mobile -->
<div class="h-[calc(100vh-64px)] flex flex-col lg:flex-row w-full overflow-hidden bg-[#eaf1ff] animate-fade-in" x-data="mauInData()">

    <!-- ==========================================
         CỘT TRÁI: DANH SÁCH BIẾN HỆ THỐNG
    =========================================== -->
    <!-- Mobile chiếm 40% chiều cao, PC chiếm 25% chiều ngang -->
    <section class="w-full lg:w-[25%] h-[40%] lg:h-full bg-white border-b lg:border-b-0 lg:border-r border-slate-300 flex flex-col z-10 shadow-sm shrink-0">
        <header class="px-6 py-4 border-b border-slate-200 bg-white sticky top-0 z-20 shrink-0">
            <h2 class="text-[20px] font-semibold text-slate-900 flex items-center gap-2">
                <span class="material-symbols-outlined text-purple-600 bg-purple-50 p-1.5 rounded-lg">data_object</span> Biến Hệ Thống
            </h2>
        </header>

        <div class="flex-1 overflow-y-auto px-6 py-4 custom-scrollbar space-y-3 bg-[#f8f9ff]">
            <p class="text-[12px] font-bold text-slate-500 mb-2 uppercase tracking-wider">Bên A</p>
            <button @click="copyVar('<<Ten_Dt_A1>>')" class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 flex justify-between items-center transition-colors">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;Ten_Dt_A1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300">content_copy</span>
            </button>
            <button @click="copyVar('<<CCCD_A1>>')" class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 flex justify-between items-center transition-colors">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;CCCD_A1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300">content_copy</span>
            </button>

            <p class="text-[12px] font-bold text-slate-500 mb-2 mt-6 uppercase tracking-wider">Tài Sản</p>
            <button @click="copyVar('<<Bien_So>>')" class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 flex justify-between items-center transition-colors">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;Bien_So&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300">content_copy</span>
            </button>
        </div>
    </section>

    <!-- ==========================================
         CỘT PHẢI: TRÌNH SOẠN THẢO TIPTAP
    =========================================== -->
    <!-- Mobile chiếm 60% chiều cao, PC chiếm phần ngang còn lại -->
    <section class="w-full lg:flex-1 h-[60%] lg:h-full flex flex-col bg-[#f3f2f1] relative overflow-hidden">
        
        <!-- Toolbar -->
        <div class="bg-white border-b border-slate-300 flex items-center justify-between px-4 py-2 shrink-0 z-20 overflow-x-auto custom-scrollbar">
            <div class="flex items-center gap-3 select-none">
                <div class="flex items-center gap-1 shrink-0">
                    <button class="border border-slate-300 rounded px-2 py-1.5 text-[13px] text-slate-700 w-36 hover:bg-slate-50 text-left">Times New Roman</button>
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
            
            <!-- Đưa nút Lưu lên góc phải Toolbar cho gọn -->
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-lg text-[13px] font-semibold flex items-center gap-1 shrink-0 transition-colors shadow-sm" @click="$dispatch('notify', 'Lưu mẫu in thành công!')">
                <span class="material-symbols-outlined text-[16px]">save</span> Lưu Mẫu
            </button>
        </div>

        <div class="w-full ruler-h z-10 shrink-0 relative shadow-sm"></div>

        <!-- Vùng Soạn Thảo (Giấy A4) -->
        <div id="scroll-container-mau-in" class="flex-1 overflow-y-auto overflow-x-hidden bg-[#e3e5e7] py-8 editor-scrollbar">
            <div id="word-editor-area-mau-in" class="flex flex-col gap-8 w-[210mm] mx-auto origin-top transition-transform duration-200">
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

    window.mauInData = function() {
        return {
            editor: null,

            copyVar(variable) {
                navigator.clipboard.writeText(variable).then(() => {
                    this.$dispatch('notify', `Đã copy biến: ${variable}`);
                });
            },

            init() {
                this.editor = new Editor({
                    element: this.$refs.tiptapEditor,
                    extensions: [
                        Document, Paragraph, Text, Bold, Italic, Underline, History,
                        TextAlign.configure({ types: ['heading', 'paragraph'] }),
                    ],
                    content: `
                        <p style="text-align: center;"><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></p>
                        <p style="text-align: center;"><strong>Độc lập - Tự do - Hạnh phúc</strong></p><br>
                        <p style="text-align: center;"><strong>MẪU HỢP ĐỒNG ỦY QUYỀN</strong></p><br>
                        <p>Chúng tôi gồm có:</p>
                        <p><strong>BÊN ỦY QUYỀN (BÊN A)</strong></p>
                        <p>Ông/Bà: <strong><<Ten_Dt_A1>></strong></p>
                        <p>CCCD: <strong><<CCCD_A1>></strong></p>
                    `,
                    onUpdate: () => { this.editor = this.editor; },
                    onSelectionUpdate: () => { this.editor = this.editor; }
                });

                // Auto Zoom cho tờ A4
                const editorArea = document.getElementById('word-editor-area-mau-in');
                const scrollContainer = document.getElementById('scroll-container-mau-in');
                const autoFitZoom = () => {
                    if(!scrollContainer || !editorArea) return;
                    const availableWidth = scrollContainer.clientWidth - 40; 
                    let scale = availableWidth / 794;
                    scale = Math.max(0.3, Math.min(scale, 1.5));
                    editorArea.style.transform = `scale(${scale})`;
                    editorArea.style.marginBottom = `${(editorArea.offsetHeight * scale) - editorArea.offsetHeight}px`;
                };
                setTimeout(autoFitZoom, 100);
                window.addEventListener('resize', autoFitZoom);
            }
        };
    };
</script>
@endsection