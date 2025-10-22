<x-crud-table 
    :items="$uppses" 
    :search-field="[
        [
            'label' => '#', 
            'name' => 'color', 
            'type' => 'color', 
            'align' => 'center',
            'width' => '1%'
        ],
        [
            'label' => 'UPPS Name', 
            'name' => 'name'
        ],
        [
            'label' => 'UPPS Initial', 
            'name' => 'initial',
            'width' => '200px'
        ],
    ]"
    create-component="dashboard.admin.register.upps.create" 
    update-component-prefix="dashboard.admin.register.upps.update" 
    delete-component-prefix="dashboard.admin.register.upps.delete"
/>
