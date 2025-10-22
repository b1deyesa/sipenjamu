<x-crud-table 
    :items="$evaluasis" 
    :search-field="[
        [
            'label' => 'Setting Name', 
            'name' => 'name'
        ],
        [
            'label' => 'UPPS', 
            'name' => 'upps.name'
        ],
        [
            'label' => 'Link', 
            'name' => 'link', 
            'type' => 'linkIcon'
        ],
    ]"
    create-component="dashboard.admin.spmi.evaluasi-lain.create"
    review-component-prefix="dashboard.admin.spmi.evaluasi-lain.verification-status"
/>