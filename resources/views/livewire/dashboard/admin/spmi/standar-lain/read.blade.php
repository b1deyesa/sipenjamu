<x-crud-table 
    :items="$standar_lains" 
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
            'name' => 'standarLainUpps.link', 
            'type' => 'linkIcon',
            'align' => 'center'
        ],
    ]"
    create-component="dashboard.admin.spmi.standar-lain.create"
    delete-component-prefix="dashboard.admin.spmi.standar-lain.delete"
    review-component-prefix="dashboard.admin.spmi.standar-lain.verification-status"
/>