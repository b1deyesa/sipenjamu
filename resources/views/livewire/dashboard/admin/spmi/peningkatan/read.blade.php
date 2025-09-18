<x-crud-table 
    :items="$peningkatans" 
    :searchField="[
        'Setting Name' => 'name'
    ]"
    createComponent="dashboard.admin.spmi.peningkatan.create" 
    updateComponentPrefix="dashboard.admin.spmi.peningkatan.update" 
    deleteComponentPrefix="dashboard.admin.spmi.peningkatan.delete"
    reviewComponentPrefix="dashboard.admin.spmi.peningkatan.review"
></x-crud-table>