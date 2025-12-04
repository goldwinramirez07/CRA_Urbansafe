<div class="w-full bg-white p-5 rounded-lg shadow mt-10 max-w-md mx-auto">

    <h2 class="text-xl font-bold mb-4">Fill out details below!</h2>

    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
        @csrf

        <label class="block mt-4">Date & Time</label>
        <input type="hidden" name="datetime" value="{{ now() }}">
        <input type="hidden" name="location" value="{{ $location ?? '' }}">

        <input type="text" class="w-full p-2 border rounded" value="{{ now() }}" disabled>

        <label class="block mt-4">Location</label>
        <input type="text" class="w-full p-2 border rounded" value="{{ $location ?? 'Location Unavailable' }}"
            disabled>

        <label class="block mt-4">Description <span class="text-sm">(optional)</span></label>
        <textarea name="description" rows="4" class="w-full p-2 border rounded"></textarea>

        <label class="block mt-4">Upload Photo/Video</label>
        <input type="file" name="media" accept="image/*" capture="camera" class="w-full p-2 border rounded">

        <button type="submit" class="w-full mt-5 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Submit {{ $label }} Report
        </button>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (pos) {
                
                let lat = pos.coords.latitude;
                let lng = pos.coords.longitude;

                document.getElementById("lat").value = lat;
                document.getElementById("lng").value = lng;

                fetch(`/reverse-geocode?lat=${lat}&lng=${lng}`)
                    .then(r => r.json())
                    .then(data => {
                        document.getElementById("location").value = data.address;
                    });
            });
        }
    });
</script>