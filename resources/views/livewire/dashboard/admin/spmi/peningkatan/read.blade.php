<x-crud-table 
    :items="$peningkatans" 
    :search-field="[
        [
            'label' => 'Setting Name', 
            'name' => 'name'
        ],
    ]"
    create-component="dashboard.admin.spmi.peningkatan.create" 
    update-component-prefix="dashboard.admin.spmi.peningkatan.update" 
    delete-component-prefix="dashboard.admin.spmi.peningkatan.delete"
    review-component-prefix="dashboard.admin.spmi.peningkatan.review"
/>