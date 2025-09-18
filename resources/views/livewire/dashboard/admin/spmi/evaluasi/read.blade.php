<x-crud-table 
    :items="$evaluasis" 
    :searchField="[
        'Setting Name' => 'name',
        'UPPS' => 'upps.name',
        'Link' => 'link',
    ]"
    createComponent="dashboard.admin.spmi.evaluasi.create"
    reviewComponentPrefix="dashboard.admin.spmi.evaluasi.verification-status"
></x-crud-table>