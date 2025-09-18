<x-crud-table 
    :items="$standar_yang_ditetapkan_institusis" 
    :searchField="[
        'Setting Name' => 'name'
    ]"
    createComponent="dashboard.admin.spmi.standar_yang_ditetapkan_institusi.create" 
    updateComponentPrefix="dashboard.admin.spmi.standar_yang_ditetapkan_institusi.update" 
    deleteComponentPrefix="dashboard.admin.spmi.standar_yang_ditetapkan_institusi.delete"
    reviewComponentPrefix="dashboard.admin.spmi.standar_yang_ditetapkan_institusi.review"
>
</x-crud-table>