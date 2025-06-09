@if ($errors->any())
<div class="mb-4">
    <ul class="list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="mb-4">
    <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
    <input type="text" name="name" id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300"
        value="{{ old('name', $member->name ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
    <input type="email" name="email" id="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-300"
        value="{{ old('email', $member->email ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
    <select name="status" id="status" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
        <option value="Aktif" @selected(old('status', $member->status ?? '') == 'Aktif')>Aktif</option>
        <option value="Non-aktif" @selected(old('status', $member->status ?? '') == 'Non-aktif')>Non-aktif</option>
    </select>
</div>

<div class="mb-4">
    <label for="password" class="block font-medium text-sm text-gray-700">New Password</label>
    <input type="password" name="password" id="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
    <p class="text-sm text-gray-500 mt-1">Leave blank to keep the current password.</p>
</div>

<div class="mb-4">
    <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm New Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
</div>
