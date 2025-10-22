<x-crud-table 
    :items="$standar_yang_ditetapkan_institusis" 
    :search-field="[
        [
            'label' => 'Setting Name', 
            'name' => 'name'
        ],
    ]"
    create-component="dashboard.admin.spmi.standar_yang_ditetapkan_institusi.create" 
    update-component-prefix="dashboard.admin.spmi.standar_yang_ditetapkan_institusi.update" 
    delete-component-prefix="dashboard.admin.spmi.standar_yang_ditetapkan_institusi.delete"
    review-component-prefix="dashboard.admin.spmi.standar_yang_ditetapkan_institusi.review"
/>