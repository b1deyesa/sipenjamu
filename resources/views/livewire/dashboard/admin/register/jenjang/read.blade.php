<x-crud-table 
    :items="$jenjangs" 
    :search-field="[
        [
            'label' => '#', 
            'name' => 'color', 
            'type' => 'color', 
            'align' => 'center',
            'width' => '1%'
        ],
        [
            'label' => 'Jenjang Name', 
            'name' => 'name'
        ],
        [
            'label' => 'Initial', 
            'name' => 'initial',
            'width' => '200px'
        ],
    ]"
    create-component="dashboard.admin.register.jenjang.create" 
    update-component-prefix="dashboard.admin.register.jenjang.update" 
    delete-component-prefix="dashboard.admin.register.jenjang.delete"
/>
