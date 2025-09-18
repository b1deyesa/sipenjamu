<x-crud-table 
    :items="$program_studis" 
    :searchField="[
        'Program Studi Name' => 'name',
        'UPPS' => 'upps.name',
        'Jenjang' => 'jenjang.name'
    ]"
    createComponent="dashboard.admin.register.program-studi.create" 
    updateComponentPrefix="dashboard.admin.register.program-studi.update" 
    deleteComponentPrefix="dashboard.admin.register.program-studi.delete"
></x-crud-table>