@extends('admin.layout')
@section('title', 'Nuevo Producto')

@section('content')
<div class="mb-5">
    <a href="{{ route('admin.products.index') }}" class="text-white/40 hover:text-letiarepa-gold text-xs transition-colors inline-flex items-center gap-1">
        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Volver a productos
    </a>
</div>

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="border border-letiarepa-gold/10 rounded-2xl p-5 sm:p-6 bg-white/[0.02] space-y-5 max-w-2xl">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs text-white/50 uppercase tracking-widest mb-2">Nombre</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full bg-transparent border border-white/10 focus:border-letiarepa-gold rounded-xl px-4 py-3 text-white text-sm outline-none transition-colors">
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs text-white/50 uppercase tracking-widest mb-2">Precio ($)</label>
                <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" required
                    class="w-full bg-transparent border border-white/10 focus:border-letiarepa-gold rounded-xl px-4 py-3 text-white text-sm outline-none transition-colors">
                @error('price')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label class="block text-xs text-white/50 uppercase tracking-widest mb-2">Descripción</label>
            <textarea name="description" rows="3" required
                class="w-full bg-transparent border border-white/10 focus:border-letiarepa-gold rounded-xl px-4 py-3 text-white text-sm outline-none transition-colors resize-none">{{ old('description') }}</textarea>
            @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs text-white/50 uppercase tracking-widest mb-2">Categoría</label>
                <select name="category_id" required
                    class="w-full bg-[#111] border border-white/10 focus:border-letiarepa-gold rounded-xl px-4 py-3 text-white text-sm outline-none transition-colors">
                    <option value="">Seleccionar...</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-end pb-1">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="is_available" value="0">
                    <input type="checkbox" name="is_available" value="1" checked class="w-4 h-4 accent-letiarepa-gold">
                    <span class="text-sm text-white/70">Producto activo</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-xs text-white/50 uppercase tracking-widest mb-2">
                Imágenes <span class="text-red-400">*</span>
            </label>
            <div id="drop-zone"
                class="border-2 border-dashed border-white/10 hover:border-letiarepa-gold/40 rounded-xl p-8 text-center cursor-pointer transition-colors"
                onclick="document.getElementById('images-input').click()">
                <svg class="w-10 h-10 text-white/20 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-white/30 text-sm">Toca o arrastra imágenes aquí</p>
                <p class="text-white/20 text-xs mt-1">JPG, PNG, WEBP — máx. 4MB por imagen</p>
            </div>
            <input type="file" id="images-input" name="images[]" multiple accept="image/*" class="hidden" onchange="previewImages(this)">
            <div id="previews" class="flex flex-wrap gap-3 mt-3"></div>
            @error('images')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit"
                class="w-full sm:w-auto px-6 py-3 rounded-xl bg-letiarepa-gold hover:bg-letiarepa-gold/90 text-black font-bold text-sm uppercase tracking-widest transition-all">
                Crear producto
            </button>
        </div>
    </div>
</form>

<script>
const dropZone = document.getElementById('drop-zone');
dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.classList.add('border-letiarepa-gold/60'); });
dropZone.addEventListener('dragleave', () => dropZone.classList.remove('border-letiarepa-gold/60'));
dropZone.addEventListener('drop', e => {
    e.preventDefault();
    dropZone.classList.remove('border-letiarepa-gold/60');
    const input = document.getElementById('images-input');
    const dt = new DataTransfer();
    [...e.dataTransfer.files].forEach(f => dt.items.add(f));
    input.files = dt.files;
    previewImages(input);
});
function previewImages(input) {
    const container = document.getElementById('previews');
    container.innerHTML = '';
    [...input.files].forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const div = document.createElement('div');
            div.innerHTML = `<img src="${e.target.result}" class="w-20 h-20 object-cover rounded-lg border border-letiarepa-gold/20">
                             <p class="text-[9px] text-white/30 mt-1 w-20 truncate">${file.name}</p>`;
            container.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
}
</script>
@endsection
