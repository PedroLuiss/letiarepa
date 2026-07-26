<section id="equipo" class="relative py-12 sm:py-16 md:py-24 xl:py-32 overflow-hidden select-none">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center lg:items-end justify-between mb-10 sm:mb-14 md:mb-20 gap-6 sm:gap-8">
            <div class="text-center lg:text-left flex flex-col">
                <span class="text-letiarepa-gold text-3xl sm:text-4xl md:text-5xl leading-none lowercase ml-1">{{ __('team.our') }}</span>
                <h2 class="font-script text-letiarepa-gold font-weight[100] text-[60px] sm:text-[100px] md:text-[140px] xl:text-[180px] leading-[0.8] tracking-tighter uppercase">
                    {{ __('team.title') }}</h2>
                <p class="font-nexa text-sm sm:text-base md:text-[20px] text-letiarepa-gold uppercase mt-[-8px]">{{ __('team.subtitle') }}
                </p>
            </div>
            <div class="hidden lg:block flex-1 h-28 ml-16 relative overflow-hidden rounded-sm" style="background-image: url('/letiarepa/images/cintilloteam.png'); background-size: cover; background-position: center;">
            </div>
        </div>
        <div class="max-w-6xl mx-auto touch-pan-y">
            <div id="team-carousel" class="overflow-hidden select-none" style="touch-action: pan-y; cursor: grab;">
                <div id="team-track" class="flex">
                    @foreach ($teamMembers as $member)
                    @php
                    $parts = explode(' ', $member->name);
                    $initials = collect($parts)->map(fn($p) => strtoupper($p[0] ?? ''))->take(2)->implode('');
                    @endphp
                    <div class="team-card flex flex-col rounded-[9px] overflow-hidden shadow-2xl transition-transform hover:-translate-y-2 group shrink-0">
                        <div class="h-24 sm:h-32 md:h-36 @if ($member->image) bg-letiarepa-gold @else bg-letiarepa-gold @endif relative">
                        </div>
                        <div class="bg-white pt-16 sm:pt-20 md:pt-24 pb-6 sm:pb-8 md:pb-10 px-4 sm:px-6 md:px-8 text-center flex flex-col items-center relative">
                            <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 rounded-full border-[3px] border-white overflow-hidden shadow-xl @if ($member->image) bg-gray-200 @else bg-letiarepa-gold @endif flex items-center justify-center">
                                @if ($member->image)
                                <img src="{{ $member->image }}" alt="{{ $member->name }}" draggable="false" class="w-full h-full object-cover select-none">
                                @else
                                <span class="text-3xl sm:text-4xl md:text-5xl font-black font-nexa text-white drop-shadow-lg">{{ $initials }}</span>
                                @endif
                            </div>
                            <h4 class="font-nexa-bold text-lg sm:text-xl md:text-2xl text-black font-black uppercase tracking-tight">
                                {{ $member->name }}</h4>
                            <p class="font-nexa text-xs sm:text-sm text-gray-500 font-bold uppercase tracking-widest mt-1 mb-4 sm:mb-6">
                                {{ $member->title }}</p>
                            <p class="text-[11px] sm:text-[12px] text-black leading-relaxed text-justify">
                                {{ $member->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="team-dots" class="flex justify-center gap-3 mt-8 sm:mt-12 md:mt-16"></div>
        <div class="flex justify-center mt-12 sm:mt-16 md:mt-24">
            <p class="font-display text-letiarepa-gold text-3xl sm:text-4xl md:text-5xl xl:text-6xl leading-none drop-shadow-lg text-center px-4">{{ __('team.thanks') }}</p>
        </div>
    </div>
</section>
