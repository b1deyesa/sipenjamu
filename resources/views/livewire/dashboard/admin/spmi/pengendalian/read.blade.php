<x-crud-table 
    :items="$pengendalians" 
    :search-field="[
        [
            'label' => 'Setting Name', 
            'name' => 'name'
        ],
    ]"
    create-component="dashboard.admin.spmi.pengendalian.create" 
    update-component-prefix="dashboard.admin.spmi.pengendalian.update" 
    delete-component-prefix="dashboard.admin.spmi.pengendalian.delete"
    review-component-prefix="dashboard.admin.spmi.pengendalian.review"
/>