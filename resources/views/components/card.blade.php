@props(['title' => null, 'class' => ''])

<div class="bg-white rounded-[25px] p-5 md:p-6 shadow-[0_4px_12px_rgba(0,0,0,0.02)] border border-[#EDF2F7] {{ $class }}">
    @if($title)
        <div class="flex justify-between items-center mb-5">
            <h3 class="text-[17px] md:text-[20px] font-semibold text-dark-blue">{{ $title }}</h3>
            @if(isset($action))
                <div>
                    {{ $action }}
                </div>
            @endif
        </div>
    @endif
    {{ $slot }}
</div>
