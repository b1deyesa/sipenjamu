<x-crud-table 
    :items="$roles" 
    :search-field="[
        [
            'label' => 'Role Name', 
            'name' => 'display_name'
        ],
        [
            'label' => 'Slug / Code', 
            'name' => 'name', 
            'type' => 'slug', 
            'align' => 'center', 
            'width' => '120px'
        ],
    ]"
    create-component="dashboard.admin.register.role.create" 
    update-component-prefix="dashboard.admin.register.role.update" 
    delete-component-prefix="dashboard.admin.register.role.delete"
/>
