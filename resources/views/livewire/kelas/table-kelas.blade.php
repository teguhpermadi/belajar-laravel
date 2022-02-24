<div>
    {{-- Do your work, then step back. --}}
    {{-- Setup data for datatables --}}
    @php
    $heads = [
        ['label' => 'Nama Kelas'],
        ['label' => 'Level'],
        ['label' => 'Aktif'],
        ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ];

    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </button>';
    $data = [];
    foreach ($kelas as $k) {
       array_push($data, [
           $k->nama, 
           $k->level, 
           $k->aktif, 
           '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'
        ]);
    }

    // dd($data);

    // $config = [
    //     'data' => [
    //         [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
    //         [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
    //         [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
    //     ],
    //     'order' => [[1, 'asc']],
    //     'columns' => [null, null, null, ['orderable' => false]],
    // ];
    $config = [
        'data' => $data,
        // 'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];

    // dd($config);
    @endphp

    {{-- Compressed with style options / fill data using the plugin config --}}
    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config"
        striped hoverable bordered compressed/>
</div>
