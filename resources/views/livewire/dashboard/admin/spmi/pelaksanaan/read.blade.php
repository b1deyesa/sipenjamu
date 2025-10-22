<x-crud-table 
    :items="$pelaksanaans" 
    :search-field="[
        [
            'label' => 'Setting Name', 
            'name' => 'name'
        ],
    ]"
    create-component="dashboard.admin.spmi.pelaksanaan.create" 
    update-component-prefix="dashboard.admin.spmi.pelaksanaan.update" 
    delete-component-prefix="dashboard.admin.spmi.pelaksanaan.delete"
    review-component-prefix="dashboard.admin.spmi.pelaksanaan.review"
/>