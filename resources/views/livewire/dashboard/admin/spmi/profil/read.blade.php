<x-crud-table 
    :items="$profils" 
    :search-field="[
        [
            'label' => 'Setting Name', 
            'name' => 'name'
        ],
        [
            'label' => 'Type', 
            'name' => 'type'
        ],
        [
            'label' => 'Profil Code', 
            'name' => 'id',
            'type' => 'slug', 
            'align' => 'center', 
            'width' => '80px'
        ]
    ]"
    create-component="dashboard.admin.spmi.profil.create" 
    update-component-prefix="dashboard.admin.spmi.profil.update" 
    delete-component-prefix="dashboard.admin.spmi.profil.delete"
/>