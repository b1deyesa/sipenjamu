<x-crud-table 
    :items="$pelaksanaans" 
    :searchField="[
        'Setting Name' => 'name'
    ]"
    createComponent="dashboard.admin.spmi.pelaksanaan.create" 
    updateComponentPrefix="dashboard.admin.spmi.pelaksanaan.update" 
    deleteComponentPrefix="dashboard.admin.spmi.pelaksanaan.delete"
    reviewComponentPrefix="dashboard.admin.spmi.pelaksanaan.review"
>
</x-crud-table>