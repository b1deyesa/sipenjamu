<x-crud-table 
    :items="$jenjangs" 
    :searchField="[
        'Jenjang Name' => 'name',
        'Initial' => 'initial',
        'Badge Color' => 'color'
    ]"
    createComponent="dashboard.admin.register.jenjang.create" 
    updateComponentPrefix="dashboard.admin.register.jenjang.update" 
    deleteComponentPrefix="dashboard.admin.register.jenjang.delete"
></x-crud-table>