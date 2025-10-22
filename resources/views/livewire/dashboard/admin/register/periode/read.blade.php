<x-crud-table 
    :items="$periodes" 
    :search-field="[
        [
            'label' => 'Periode', 
            'name' => 'name'
        ],
        [
            'label' => 'Start Date', 
            'name' => 'start_date',
            'width' => '150px',
            'type' => 'date'
        ],
        [
            'label' => 'End Date', 
            'name' => 'end_date',
            'width' => '150px',
            'type' => 'date'
        ]
    ]"
    create-component="dashboard.admin.register.periode.create" 
    update-component-prefix="dashboard.admin.register.periode.update" 
    delete-component-prefix="dashboard.admin.register.periode.delete"
/>