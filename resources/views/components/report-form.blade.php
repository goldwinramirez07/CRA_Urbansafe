<div class="w-full bg-white p-5 rounded-lg shadow mt-10 max-w-md mx-auto">

    <h2 class="text-xl font-bold mb-4">Fill out details below!</h2>

    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">

        <label class="block mt-4">Date & Time</label>
        <input type="text" class="w-full p-2 border rounded" value="{{ now() }}" disabled>
        <input type="hidden" name="datetime" value="{{ now() }}">

        <label class="block mt-4">Location</label>
        <input type="text" id="location_display" class="w-full p-2 border rounded" value="{{ $location ?? 'Location Unavailable' }}" disabled>
        <input type="hidden" name="location" value="{{ $location ?? '' }}">

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
        if(!navigator.geolocation) {
            document.getElementById('location_display').value = "Geolocation is not supported, please allow access location access.";
            return;
        }

        navigator.geolocation.getCurrentPosition(sucess, error);

        function sucess(pos) {
            let lat =pos.coords.latitude;
            let lon = pos.coords.longitude;

            docuemnt.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            let locationiq = {{ config('services.locationiq.key') }};
            let url = 'https://us1.locationiq.com/v1/reverse?key=${apiKey}&lat=${lat}&lon=${lon}&format=json`;

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    let address = data.display_name ?? "Uknown Location";
                    document.getElementById('location_display').value = address;
                    document.getelementById('location').value = address;
                })
                .catch(() => {
                    document.getElementById('location_display').value = "Unable To retrieve location";
                });

        function error(err) {
            docuemnt.getElemenetById('location_display').value = "Location access is prohibited..";
        }

    });
</script>