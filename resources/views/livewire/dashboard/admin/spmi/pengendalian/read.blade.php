<x-crud-table 
    :items="$pengendalians" 
    :searchField="[
        'Setting Name' => 'name'
    ]"
    createComponent="dashboard.admin.spmi.pengendalian.create" 
    updateComponentPrefix="dashboard.admin.spmi.pengendalian.update" 
    deleteComponentPrefix="dashboard.admin.spmi.pengendalian.delete"
    reviewComponentPrefix="dashboard.admin.spmi.pengendalian.review"
>
</x-crud-table>