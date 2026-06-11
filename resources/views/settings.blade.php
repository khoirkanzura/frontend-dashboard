<x-layouts-app>
    <x-slot:title>Setting</x-slot:title>

    <x-card class="p-6 md:p-8 !rounded-[25px]">
        <!-- Tab Navigation Headers -->
        <div class="border-b border-[#E6EFF5] flex items-center gap-[38px] mb-8 overflow-x-auto custom-scrollbar">
            <button 
                id="tab-btn-profile" 
                onclick="switchTab('profile')"
                class="tab-btn py-3 text-sm md:text-base font-medium transition-all relative whitespace-nowrap {{ $active_tab === 'profile' ? 'text-primary-blue font-semibold border-b-2 border-primary-blue' : 'text-gray-text hover:text-dark-blue' }}"
            >
                Edit Profile
            </button>
            <button 
                id="tab-btn-preferences" 
                onclick="switchTab('preferences')"
                class="tab-btn py-3 text-sm md:text-base font-medium transition-all relative whitespace-nowrap {{ $active_tab === 'preferences' ? 'text-primary-blue font-semibold border-b-2 border-primary-blue' : 'text-gray-text hover:text-dark-blue' }}"
            >
                Preferences
            </button>
            <button 
                id="tab-btn-security" 
                onclick="switchTab('security')"
                class="tab-btn py-3 text-sm md:text-base font-medium transition-all relative whitespace-nowrap {{ $active_tab === 'security' ? 'text-primary-blue font-semibold border-b-2 border-primary-blue' : 'text-gray-text hover:text-dark-blue' }}"
            >
                Security
            </button>
        </div>

        <!-- Tab Panel 1: Edit Profile -->
        <div id="panel-profile" class="tab-panel {{ $active_tab === 'profile' ? '' : 'hidden' }}">
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                @csrf
                <input type="hidden" name="section" value="profile">

                <!-- Left Column: Avatar Uploader -->
                <div class="flex flex-col items-center shrink-0">
                    <div class="relative w-[130px] h-[130px]">
                        <img 
                            id="avatar-preview" 
                            src="{{ $profile['avatar'] }}" 
                            alt="{{ $profile['name'] }}" 
                            class="w-full h-full object-cover rounded-full border border-slate-100"
                        >
                        <!-- Edit Icon Circle Badge -->
                        <label for="avatar-input" class="absolute bottom-1 right-1 w-[38px] h-[38px] rounded-full bg-primary-blue hover:bg-blue-800 text-white flex items-center justify-center cursor-pointer shadow-md transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </label>
                        <input 
                            type="file" 
                            id="avatar-input" 
                            name="avatar" 
                            accept="image/*" 
                            class="hidden"
                            onchange="previewImage(event)"
                        >
                    </div>
                    <span class="text-xs text-gray-text mt-3">Click badge to change avatar</span>
                </div>

                <!-- Right Column: Input Grid -->
                <div class="flex-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-x-[30px] md:gap-y-[22px] mb-8">
                        <!-- Full Name -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Your Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                value="{{ $profile['name'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>
                        
                        <!-- User Name -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">User Name</label>
                            <input 
                                type="text" 
                                name="username" 
                                value="{{ $profile['username'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                value="{{ $profile['email'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                value="{{ $profile['password'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Date of Birth</label>
                            <input 
                                type="date" 
                                name="dob" 
                                value="{{ $profile['dob'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- Present Address -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Present Address</label>
                            <input 
                                type="text" 
                                name="present_address" 
                                value="{{ $profile['present_address'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- Permanent Address -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Permanent Address</label>
                            <input 
                                type="text" 
                                name="permanent_address" 
                                value="{{ $profile['permanent_address'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- City -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">City</label>
                            <input 
                                type="text" 
                                name="city" 
                                value="{{ $profile['city'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- Postal Code -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Postal Code</label>
                            <input 
                                type="text" 
                                name="postal_code" 
                                value="{{ $profile['postal_code'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- Country -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Country</label>
                            <input 
                                type="text" 
                                name="country" 
                                value="{{ $profile['country'] }}" 
                                required
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3 text-sm md:text-[15px]"
                            >
                        </div>
                    </div>

                    <!-- Submit Button row -->
                    <div class="flex justify-end">
                        <button type="submit" class="w-full md:w-auto bg-[#1814F3] hover:bg-blue-800 text-white font-medium rounded-[15px] px-[70px] py-[14px] transition-all hover:shadow-md active:scale-98">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tab Panel 2: Preferences -->
        <div id="panel-preferences" class="tab-panel {{ $active_tab === 'preferences' ? '' : 'hidden' }}">
            <form action="{{ route('settings.update') }}" method="POST" class="max-w-[750px]">
                @csrf
                <input type="hidden" name="section" value="preferences">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-x-[30px] md:gap-y-[22px] mb-8">
                    <!-- Currency selector -->
                    <div>
                        <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Currency</label>
                        <select name="currency" class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3.5 text-sm md:text-[15px] appearance-none">
                            <option value="USD" {{ $preferences['currency'] === 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ $preferences['currency'] === 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="IDR" {{ $preferences['currency'] === 'IDR' ? 'selected' : '' }}>IDR</option>
                        </select>
                    </div>

                    <!-- Time Zone -->
                    <div>
                        <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Time Zone</label>
                        <select name="timezone" class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3.5 text-sm md:text-[15px]">
                            <option value="GMT-12:00 International Date Line West" {{ $preferences['timezone'] === 'GMT-12:00 International Date Line West' ? 'selected' : '' }}>GMT-12:00 International Date Line West</option>
                            <option value="GMT+07:00 Jakarta, Bangkok" {{ $preferences['timezone'] === 'GMT+07:00 Jakarta, Bangkok' ? 'selected' : '' }}>GMT+07:00 Jakarta, Bangkok</option>
                            <option value="GMT+00:00 London, UTC" {{ $preferences['timezone'] === 'GMT+00:00 London, UTC' ? 'selected' : '' }}>GMT+00:00 London, UTC</option>
                        </select>
                    </div>
                </div>

                <!-- Notifications Toggles -->
                <div class="mb-8">
                    <h4 class="text-base font-semibold text-dark-blue mb-5">Notification</h4>
                    
                    <div class="space-y-4">
                        <!-- Toggle 1 -->
                        <div class="flex items-center gap-4">
                            <label class="relative inline-flex items-center cursor-pointer select-none">
                                <input type="checkbox" name="notif_digital" class="sr-only peer" {{ $preferences['notif_digital'] ? 'checked' : '' }}>
                                <div class="w-[52px] h-[30px] bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[3px] after:left-[3px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#16A34A]"></div>
                            </label>
                            <span class="text-sm md:text-[15px] font-normal text-[#3b3b3b]">I send or receive digital currency</span>
                        </div>

                        <!-- Toggle 2 -->
                        <div class="flex items-center gap-4">
                            <label class="relative inline-flex items-center cursor-pointer select-none">
                                <input type="checkbox" name="notif_merchant" class="sr-only peer" {{ $preferences['notif_merchant'] ? 'checked' : '' }}>
                                <div class="w-[52px] h-[30px] bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[3px] after:left-[3px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#16A34A]"></div>
                            </label>
                            <span class="text-sm md:text-[15px] font-normal text-[#3b3b3b]">I receive merchant Order</span>
                        </div>

                        <!-- Toggle 3 -->
                        <div class="flex items-center gap-4">
                            <label class="relative inline-flex items-center cursor-pointer select-none">
                                <input type="checkbox" name="notif_recommend" class="sr-only peer" {{ $preferences['notif_recommend'] ? 'checked' : '' }}>
                                <div class="w-[52px] h-[30px] bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[3px] after:left-[3px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#16A34A]"></div>
                            </label>
                            <span class="text-sm md:text-[15px] font-normal text-[#3b3b3b]">There are recommendations for my account</span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end md:justify-start">
                    <button type="submit" class="w-full md:w-auto bg-[#1814F3] hover:bg-blue-800 text-white font-medium rounded-[15px] px-[70px] py-[14px] transition-all hover:shadow-md">
                        Save
                    </button>
                </div>
            </form>
        </div>

        <!-- Tab Panel 3: Security -->
        <div id="panel-security" class="tab-panel {{ $active_tab === 'security' ? '' : 'hidden' }}">
            <form action="{{ route('settings.update') }}" method="POST" class="max-w-[750px]">
                @csrf
                <input type="hidden" name="section" value="security">

                <!-- 2FA section -->
                <div class="mb-8">
                    <h4 class="text-base font-semibold text-dark-blue mb-4">Two-Factor Authentication</h4>
                    <div class="flex items-center gap-4">
                        <label class="relative inline-flex items-center cursor-pointer select-none">
                            <input type="checkbox" name="two_factor" class="sr-only peer" {{ $security['two_factor'] ? 'checked' : '' }}>
                            <div class="w-[52px] h-[30px] bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[3px] after:left-[3px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#16A34A]"></div>
                        </label>
                        <span class="text-sm md:text-[15px] font-normal text-dark-blue">Enable or disable two-factor authentication</span>
                    </div>
                </div>

                <!-- Password modification section -->
                <div>
                    <h4 class="text-base font-semibold text-dark-blue mb-5">Change Password</h4>
                    
                    <!-- Error handling banner for security tab -->
                    @if($errors->any())
                        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl text-xs md:text-sm font-medium">
                            <ul class="list-disc pl-4 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-[22px] mb-8">
                        <!-- Current Password -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">Current Password</label>
                            <input 
                                type="password" 
                                name="current_password" 
                                placeholder="••••••••"
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3.5 text-sm md:text-[15px]"
                            >
                        </div>

                        <!-- New Password -->
                        <div>
                            <label class="block text-[15px] font-normal text-dark-blue mb-2.5">New Password</label>
                            <input 
                                type="password" 
                                name="new_password" 
                                placeholder="••••••••"
                                class="w-full form-input bg-white text-dark-blue border border-[#DFEAF2] rounded-[15px] px-5 py-3.5 text-sm md:text-[15px]"
                            >
                        </div>


                    </div>

                    <div class="flex justify-end md:justify-start">
                        <button type="submit" class="w-full md:w-auto bg-[#1814F3] hover:bg-blue-800 text-white font-medium rounded-[15px] px-[70px] py-[14px] transition-all hover:shadow-md">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-card>

    <!-- Client-Side Tab Switching Script -->
    <script>
        function switchTab(tabId) {
            // Hide all tab panels
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.add('hidden');
            });
            
            // Show requested tab panel
            document.getElementById(`panel-${tabId}`).classList.remove('hidden');

            // Reset tab button states
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.className = "tab-btn py-3 text-sm md:text-base font-medium transition-all relative whitespace-nowrap text-gray-text hover:text-dark-blue";
            });

            // Set active class on active button
            const activeBtn = document.getElementById(`tab-btn-${tabId}`);
            activeBtn.className = "tab-btn py-3 text-sm md:text-base font-semibold transition-all relative whitespace-nowrap text-primary-blue border-b-2 border-primary-blue";
        }

        // Preview local avatar image before uploading
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('avatar-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-layouts-app>
