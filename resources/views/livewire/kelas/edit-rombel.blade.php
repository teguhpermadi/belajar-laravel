<div>
    {{-- Be like water. --}}
    <select id="callbacks" multiple='multiple' name="selected_siswa[]" class="searchable">
        @foreach ($siswa as $item => $key)
        <option value="{{ $item }}">{{ $key }}</option>
        @endforeach
    </select>


    <script>
        document.addEventListener('livewire:load', function () {
            // $('#callbacks').multiSelect({
            //     afterSelect: function(values) {
            //         alert("Select value: " + values);
            //     },
            //     afterDeselect: function(values) {
            //         alert("Deselect value: " + values);
            //     },
            // });
            $('#callbacks').multiSelect({
                keepOrder: true
            });
            
            $('#callbacks').multiSelect('select', {!!$selectedSiswa!!});
            
        })
    </script>
</div>