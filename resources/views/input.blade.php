<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">
        <button onclick="refresh(this)">Yenile</button>
        <img src="{{ route('captcha.generate', ['refresh' => 0, 'type' => $type]) }}" alt="Captcha">
    </span>
    <input type="text" name="{{$type}}" class="form-control" placeholder="Güvenlik Kodu" aria-label="Username"
        aria-describedby="basic-addon1">

    @error($type)
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<script>
    function refresh(e) {
        fetch("{{ route('captcha.generate', ['refresh' => 1, 'type' => $type]) }}")
            .then(response => response.text())
            .then(res => {
                const img = e.parentNode.querySelector('img');
                if (img) {
                    img.src = res;
                }
            })
            .catch(err => console.error('Captcha refresh error:', err));
    }
</script>
