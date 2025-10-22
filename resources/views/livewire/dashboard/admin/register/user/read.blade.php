<x-crud-table 
    :items="$users" 
    :search-field="[
        [
            'label' => 'Name', 
            'name' => 'name'
        ],
        [
            'label' => 'Email', 
            'name' => 'email',
            'type' => 'email'
        ],
    ]"
    create-component="dashboard.admin.register.user.create" 
    update-component-prefix="dashboard.admin.register.user.update" 
    delete-component-prefix="dashboard.admin.register.user.delete"
/>