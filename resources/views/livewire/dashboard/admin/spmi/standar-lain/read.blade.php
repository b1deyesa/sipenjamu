<x-crud-table 
    :items="$standar_lains" 
    :searchField="[
        'Setting Name' => 'name',
        'UPPS' => 'upps.name',
        'Link' => 'link',
    ]"
    createComponent="dashboard.admin.spmi.standar-lain.create"
    reviewComponentPrefix="dashboard.admin.spmi.standar-lain.verification-status"
></x-crud-table>