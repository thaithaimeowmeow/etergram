<!-- Avatar Upload -->
<form action="" class="flex flex-col items-center space-y-4">

    @csrf
    <div class="flex flex-col items-center">
        <label for="avatar-upload" class="cursor-pointer">
            <img id="avatar-preview" src="https://via.placeholder.com/100" alt="Avatar Preview"
                class="w-24 h-24 rounded-full border border-gray-300 mb-2">
            <span class="text-blue-500">Upload Avatar</span>
        </label>
        <input type="file" id="avatar-upload" class="hidden" accept="image/*" onchange="previewAvatar()">
    </div>
    <!-- Save Button -->
    <button
        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
        Save
    </button>
</form>
<script>
    function previewAvatar() {
        const file = document.getElementById('avatar-upload').files[0];
        const reader = new FileReader();
        reader.onloadend = function() {
            document.getElementById('avatar-preview').src = reader.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
