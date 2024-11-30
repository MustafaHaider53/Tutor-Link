
<x-guest-layout>
    <form method="POST" action="{{ route('student.register.submit') }}" enctype="multipart/form-data">
        @csrf

        <!-- Full Name -->
        <div class="form-group custom-form-group">
            <x-input-label for="name" :value="__('Full Name')" />   
            <x-text-input id="name" class="form-control custom-input block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="form-control custom-input block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="form-control custom-input block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="form-control custom-input block mt-1 w-full" type="text" name="location" :value="old('location')" required />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <!-- Subjects Needed -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="subjects" :value="__('Subjects Needed')" />
            <select multiple id="subjects" name="subjects_needed[]" class="form-control custom-select block mt-1 w-full" size="5">
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="History">History</option>
                <option value="Physics">Physics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Biology">Biology</option>
            </select>
            <x-input-error :messages="$errors->get('subjects_needed')" class="mt-2" />
        </div>

        <!-- Preferred Learning Style -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="learning_style" :value="__('Preferred Learning Style')" />
            <select id="learning_style" name="learning_style" class="form-control custom-select block mt-1 w-full" required>
                <option value="" disabled selected>Select a learning style</option>
                <option value="Visual">Visual</option>
                <option value="Auditory">Auditory</option>
                <option value="Kinesthetic">Kinesthetic</option>
            </select>
            <x-input-error :messages="$errors->get('learning_style')" class="mt-2" />
        </div>

        <!-- Availability Days -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="availability_days" :value="__('Availability Days')" />
            <div class="custom-checkbox-group">
                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                    <div class="form-check form-check-inline custom-checkbox-item">
                        <input class="form-check-input custom-checkbox" type="checkbox" name="availability_days[]" value="{{ $day }}">
                        <label class="form-check-label custom-checkbox-label">{{ $day }}</label>
                    </div>
                @endforeach
            </div>
            <x-input-error :messages="$errors->get('availability_days')" class="mt-2" />
        </div>

        <!-- Additional Notes -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="notes" :value="__('Additional Notes/Requests')" />
            <textarea id="notes" name="notes" class="form-control custom-textarea block mt-1 w-full" rows="3">{{ old('notes') }}</textarea>
            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
        </div>

        <!-- Profile Picture -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="profile_picture" :value="__('Profile Picture (optional)')" />
            <input type="file" id="profile_picture" name="profile_picture" class="form-control-file custom-file-input" />
            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="form-control custom-input block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group custom-form-group mt-4">
            <x-input-label for="confirm_password" :value="__('Confirm Password')" />
            <x-text-input id="confirm_password" class="form-control custom-input block mt-1 w-full" type="password" name="confirm_password" required />
            <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <x-primary-button class="custom-submit-button">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
